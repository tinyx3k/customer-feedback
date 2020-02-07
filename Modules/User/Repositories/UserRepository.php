<?php

namespace Modules\User\Repositories;

use Modules\Core\Repositories\AbstractEloquentRepository;
use Modules\User\Entities\User;
use Modules\User\Interfaces\UserRepositoryInterface;

class UserRepository extends AbstractEloquentRepository implements UserRepositoryInterface
{
    public function select2User($value)
    {
        $query = $this->model->query();
        $query->whereHas('roles', function ($q) {
            $q->where('name', 'member')->with('roles');
        });
        if (isset($value['q'])) {

            $search = $value['q'];
            $query
                ->whereRaw('concat_ws(" ", first_name, middle_name, last_name) like "%' . $search . '%"')
                ->orWhereRaw('concat_ws(", ", first_name, middle_name, last_name) like "%' . $search . '%"')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('agency_employee_no', 'like', '%' . $search . '%');
        }

        foreach ($query->get() as $key => $data) {
            $user = "(" . $data->agency_employee_no . ") " . $data->first_name . " " . $data->middle_name . " " . $data->last_name;
            $datas['results'][] = [
                'id' => $data->id . ',user',
                'text' => $user,
            ];
        }
        $datas['pagination'] = [
            'more' => false,
        ];
        return $datas;
    }

    public function updateOrCreate($user_info_params, $data)
    {
        return $this->model->updateOrCreate($user_info_params, $data);
    }

    public function findByAgencyId($agency_employee_no)
    {
        return $this->model->where('agency_employee_no', $agency_employee_no)->first();
    }

    public function withTrashed()
    {
        return User::withTrashed();
    }
}

<?php

namespace Modules\Core\Traits;
/*
 * A trait to handle authorization based on users permissions for given controller
 */

trait Authorizable
{
    /**
     * Abilities
     *
     * @var array
     */
    private $abilities = [
        'index'        => 'view',
        'edit'         => 'edit',
        'show'         => 'show',
        'update'       => 'update',
        'create'       => 'create',
        'store'        => 'store',
        'destroy'      => 'delete',
        'datatable'    => 'datatable',
        'restore'      => 'restore',
    ];

    /**
     * Override of callAction to perform the authorization before it calls the action
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        if( $ability = $this->getAbility($method) ) {
            if (!auth()->user()->ability(array('Super Admin'), array($ability))) {
                abort(403);
            }
        }
        return parent::callAction($method, $parameters);
    }

    /**
     * Get ability
     *
     * @param $method
     * @return null|string
     */
    public function getAbility($method)
    {
        $routeName = explode('.', \Request::route()->getName());
        $action = array_get($this->getAbilities(), $method);
        //dd($action ? $action . '_' . $routeName[0] : null);
        return $action ? $action . '_' . $routeName[0] : null;
    }

    /**
     * @return array
     */
    private function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * @param array $abilities
     */
    public function setAbilities($abilities)
    {
        foreach ($abilities as $function => $abilitiy) {
            $this->abilities[$function] = $abilitiy;
        }

    }
}

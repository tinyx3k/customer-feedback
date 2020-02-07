<?php

use Illuminate\Database\Seeder;
use Modules\User\Entities\Permission;

class PermissionSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$permissions = [
			1 => [
				'name' => 'view_role',
			],
			2 => [
				'name' => 'datatable_role',
			],
			3 => [
				'name' => 'edit_role',
			],
			4 => [
				'name' => 'show_role',
			],
			5 => [
				'name' => 'update_role',
			],
			6 => [
				'name' => 'create_role',
			],
			7 => [
				'name' => 'store_role',
			],
			8 => [
				'name' => 'delete_role',
			],
			9 => [
				'name' => 'restore_role',
			],
			10 => [
				'name' => 'view_permission',
			],
			11 => [
				'name' => 'datatable_permission',
			],
			12 => [
				'name' => 'edit_permission',
			],
			13 => [
				'name' => 'show_permission',
			],
			14 => [
				'name' => 'update_permission',
			],
			15 => [
				'name' => 'create_permission',
			],
			16 => [
				'name' => 'store_permission',
			],
			17 => [
				'name' => 'delete_permission',
			],
			18 => [
				'name' => 'restore_permission',
			],
			19 => [
				'name' => 'view_user',
			],
			20 => [
				'name' => 'datatable_user',
			],
			21 => [
				'name' => 'edit_user',
			],
			22 => [
				'name' => 'show_user',
			],
			23 => [
				'name' => 'update_user',
			],
			24 => [
				'name' => 'create_user',
			],
			25 => [
				'name' => 'store_user',
			],
			26 => [
				'name' => 'delete_user',
			],
			27 => [
				'name' => 'restore_user',
			],
			28 => [
				'name' => 'view_article',
			],
			29 => [
				'name' => 'datatable_article',
			],
			30 => [
				'name' => 'show_article',
			],
			31 => [
				'name' => 'create_article',
			],
			32 => [
				'name' => 'store_article',
			],
			33 => [
				'name' => 'edit_article',
			],
			34 => [
				'name' => 'update_article',
			],
			35 => [
				'name' => 'view_video',
			],
			36 => [
				'name' => 'datatable_video',
			],
			37 => [
				'name' => 'show_video',
			],
			38 => [
				'name' => 'create_video',
			],
			39 => [
				'name' => 'store_video',
			],
			40 => [
				'name' => 'view_spinwizard',
			],
			41 => [
				'name' => 'view_social-media',
			],
			42 => [
				'name' => 'view_credit',
			],
			43 => [
				'name' => 'view_submission-cost',
			],
			44 => [
				'name' => 'datatable_submissioncost',
			],
			45 => [
				'name' => 'view_activity-log',
			],
			46 => [
				'name' => 'datatable_activity',
			],
			47 => [
				'name' => 'show_social-media',
			],
			48 => [
				'name' => 'view_pressrelease',
			],
			49 => [
				'name' => 'view_web',
			],
			50 => [
				'name' => 'datatable_web',
			],
			51 => [
				'name' => 'show_web',
			],
			52 => [
				'name' => 'create_web',
			],
			53 => [
				'name' => 'view_key',
			],
			54 => [
				'name' => 'datatable_key',
			],
			55 => [
				'name' => 'edit_key',
			],
			56 => [
				'name' => 'show_key',
			],
			57 => [
				'name' => 'update_key',
			],
			58 => [
				'name' => 'create_key',
			],
			59 => [
				'name' => 'store_key',
			],
			60 => [
				'name' => 'delete_key',
			],
			61 => [
				'name' => 'view_pdf',
			],
			62 => [
				'name' => 'datatable_pdf',
			],
			63 => [
				'name' => 'show_pdf',
			],
			64 => [
				'name' => 'create_pdf',
			],
			65 => [
				'name' => 'store_pdf',
			],
			66 => [
				'name' => 'store_web',
			],
			67 => [
				'name' => 'store_campaign',
			],
			68 => [
				'name' => 'create_campaign',
			],
			69 => [
				'name' => 'view_campaign',
			],
			70 => [
				'name' => 'show_campaign',
			],
			71 => [
				'name' => 'update_campaign',
			],
			72 => [
				'name' => 'edit_campaign',
			],
			73 => [
				'name' => 'delete_campaign',
			],

		];

		foreach ($permissions as $permission) {
			$role_permission = new Permission;
			$desc = explode('_', $permission['name']);
			$permission['description'] = $desc[1];
			$role_permission->create($permission);
		}
	}
}

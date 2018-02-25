@extends('dashboard.layouts.app')

@section('title', 'Role')

@section('contents')

	@include('dashboard.roles.partials._modal-delete', compact('role'))

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Role</h3>
			<div class="box-tools">
				<a href="#" class="btn btn-primary btn-flat btn-sm" title="Edit this role.">Edit</a>
				<a href="#" class="btn btn-danger btn-flat btn-sm" title="Delete this role." data-toggle="modal" data-target="#role-{{ $role->id }}-delete-modal">Delete</a>
			</div>
		</div>
		<div class="box-body">
			<h4>Name: <strong>{{ $role->name }}</strong></h4>
			<p>Details: <strong>{{ $role->details }}</strong></p>
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<h4>Permissions:</h4>
					<hr>
					<table class="table table-bordered">
						<tr>
							<th>Name</th>
							<th>Details</th>
							<th class="text-right">Actions</th>
						</tr>
						@foreach ($permissions as $permission)
							<tr>
								<td>{{ formatPermissionName($permission->name) }}</td>
								<td>{{ $permission->details }}</td>
								<td class="text-right">
									<a href="#" class="btn btn-warning btn-xs btn-flat" title="Remove this permission from role.">Remove Permission</a>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
				<div class="col-lg-6">
					<h4>Admins:</h4>
					<hr>
					<table class="table table-bordered">
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th class="text-right">Actions</th>
						</tr>
						@foreach ($admins as $admin)
							<tr>
								<td><a href="#">{{ $admin->firstname }} {{ $admin->lastname }}</a></td>
								<td>{{ $admin->email }}</td>
								<td>{{ $admin->phone }}</td>
								<td class="text-right">
									<a href="#" title="Remove this Admin from this role." class="btn btn-warning btn-xs btn-flat">Remove from Role</a>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /.box -->

@endsection
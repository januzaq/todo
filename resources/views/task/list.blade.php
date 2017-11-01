@extends('layouts.app')

@section('title', 'Задачи')
@section('content')
	<div class="container">

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
					<div class="panel-body">
						<!-- Форма новой задачи -->
						<form action="{{route('store')}}" method="POST" class="form-horizontal">
						{{ csrf_field() }}

							<!-- Имя задачи -->
							<div class="form-group">
								<label for="task" class="col-sm-3 control-label">Задача</label>

								<div class="col-sm-6">
								  <input type="text" name="text" id="task-name" class="form-control">
								</div>
							</div>

							<!-- Кнопка добавления задачи -->
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
								  <button type="submit" class="btn btn-default" id="add">
								    <i class="fa fa-plus"></i> Добавить задачу
								  </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<!-- Текущие задачи -->
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    Текущая задача
				  </div>

				  <div class="panel-body">
				    <table class="table table-striped task-table">

				      <!-- Заголовок таблицы -->
				      <thead>
				        <th>Задача</th>
				        <th></th>
				        <th></th>
				      </thead>

				      <!-- Тело таблицы -->
				      <tbody>
				        @foreach ($tasks as $task)
				          <tr>
				            <!-- Имя задачи -->
				            <td class="table-text">
				              <div>{{ $task->text }}</div>
				            </td>

				            <!-- Кнопка Удалить -->
							<td>
							<form action="{{ url('task/'.$task->id) }}" method="POST">
							  {{ csrf_field() }}
							  {{ method_field('DELETE') }}

							  <button type="submit" id="delete-task-{{ $task->id }}" class="delete btn btn-default">
							    Удалить
							  </button>
							</form>
							</td>

							<td>
							<form action="{{ url('task/'.$task->id.'/edit') }}" method="GET">

							  <button type="submit"  class="btn btn-default">
							    Редактировать
							  </button>
							</form>
							</td>
				          </tr>
				        @endforeach
				      </tbody>
				    </table>
				  </div>
				</div>
			</div>	
			
		</div>
	</div>
@endsection
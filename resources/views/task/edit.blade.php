@extends('layouts.app')

@section('title', 'Задачи')
@section('content')
	<div class="container">

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
					<div class="panel-body">
						<!-- Форма новой задачи -->

						<form action="{{url('task/'.$task->id)}}" method="POST" class="form-horizontal">
						{{ csrf_field() }}

							<!-- Имя задачи -->
							<div class="form-group">
								<label for="task" class="col-sm-3 control-label">Задача</label>

								<div class="col-sm-6">
								  <input type="text" name="text" id="task-name" class="form-control" value="{{$task->text}}">
								</div>
							</div>

							<!-- Кнопка добавления задачи -->
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
								  <button type="submit" class="save btn btn-default">
								    Сохранить
								  </button>
								  <a href="{{route('tasks')}}" class="back btn btn-default">Назад</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection		
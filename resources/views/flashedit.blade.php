@inject('flash', 'Gocanto\Flashed\Flash')

@if ($flash->exists() || $flash->hasErrors())
	<div class="panel {{ $flash->panelClass }}">
		<div class="panel-heading">
			<i class="{{ $flash->icon }}" aria-hidden="true"></i>&nbsp;{{ $flash->title }}
		</div>
		<div class="panel-body">
			@if (is_array($flash->body))
				<ul>
					@foreach ($flash->body as $error)
						<li>{{ ucfirst($error) }}</li>
					@endforeach
				</ul>
			@else
				{{ ucfirst($flash->body) }}
			@endif
		</div>
	</div>
@endif
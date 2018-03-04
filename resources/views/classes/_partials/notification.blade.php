<a class="list-group-item">
<strong>{{ ($notification->data['classrequest']['classname'])}}</strong>
Was {{ ($notification->data['classrequest']['status'])}} by 
<small class="text-muted">
	{{ $notification->data['user']['name'] }}
	{{ $notification->created_at->diffForHumans() }}
</small>
</a>

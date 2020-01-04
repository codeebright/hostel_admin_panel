<table class="table table-bordered">
    <thead>
        <tr class="bg-light">
        <th scope="col" width="10%">{{ trans('global.number') }}</th>
        <th scope="col" width="70%">{{ trans('global.name') }}</th>
        <th scope="col" width="20%">{{ trans('global.download') }}</th>
        </tr>
    </thead>
    <tbody>
        @if($attachments)
            @foreach($attachments as $item)
                <tr>
                    <td>{!! $item->id !!}</td>
                    <td>{!! $item->filename !!}.{!! $item->extension !!}</td>
                    <td><a class="text-decoration-none" href="{{ route("DownloadAttachments",array(encrypt($item->id),$table)) }}"><i class="fa fa-download"></i> {{ trans('global.download') }}</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
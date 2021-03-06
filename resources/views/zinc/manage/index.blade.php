@extends('layouts.master')

@section('main')
  <div class="right-align">
    <a
      href="{{ route('zinc.manage.create') }}"
      class="btn waves-effect waves-light light-green"
    ><i class="fa fa-plus"></i></a>
  </div>

  <table class="bordered striped highlight centered">
    <thead>
      <tr>
        <th>時間</th>
        <th>主題</th>
        <th>發布</th>
        <th>編輯 / 刪除</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($zincs as $zinc)
        <tr>
          <td>{{ $zinc->getAttribute('year') }} 年 {{ $zinc->getAttribute('month') }} 月份</td>
          <td>
            {!! link_to_route('zinc.show', $zinc->getAttribute('topic'), ['year' => $zinc->getAttribute('year'), 'month' => $zinc->getAttribute('month')], ['target' => '_blank']) !!}
          </td>
          <td>
            <i class="fa {{ $zinc->getAttribute('published') ? 'fa-check green-text' : 'fa-times red-text' }}"></i>
          </td>
          <td>
            <a href="{{ route('zinc.manage.edit', [$zinc->getAttribute('id')]) }}" class="btn waves-effect waves-light orange"><i class="fa fa-pencil"></i></a>

            <a
              class="btn waves-effect waves-light red"
              data-delete="tr"
              data-url="{{ route('zinc.manage.destroy', ['manage' => $zinc->getAttribute('id')])  }}"
            ><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @include('layouts.simple-paginate', ['pagination' => $zincs])
@endsection

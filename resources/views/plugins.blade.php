@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-barchart"></i>Pikaday</div>
    <div class="card-body">
        <input type="text" class="form-control" id="datepicker" value="{{ date('Y-m-d') }}">
    </div>
</div>
<div class="card mt-4">
    <div class="card-header"><i class="iconfont icon-edit-square"></i>WangEditor</div>
    <div class="card-body">
        <div id="editor">
            <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
        </div>
    </div>
</div>
<div class="card mt-4 pb-4">
    <div class="card-header"><i class="iconfont icon-edit-square"></i>MarkdownEditor</div>
    <div class="card-body">
        <textarea id="mark"></textarea>
    </div>
</div>
@endsection
@push('js')

<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'YYYY-MM-DD',
        onSelect: function() {
            console.log(this.getMoment().format('YYYY-MM-DD'));
        },
        i18n: {
            previousMonth: '上个月',
            nextMonth: '下个月',
            months: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
            weekdays: ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日'],
            weekdaysShort: ['一', '二', '三', '四', '五', '六', '日'],
        }
    });

    var editor = new wangEditor('#editor')
    editor.create()

    var simplemde = new Simplemde({
        element: document.getElementById("mark")
    });
</script>
@endpush
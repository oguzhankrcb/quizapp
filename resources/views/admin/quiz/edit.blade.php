<x-app-layout>
    <x-slot name="header">Quiz Düzenle</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.update', $quiz->id)}}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $quiz->title }}">
                </div>

                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <textarea rows="4" name="description" id="description" class="form-control">{{ $quiz->description }}</textarea>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="chkFinishDate" @if ($quiz->finish_at != null) checked @endif>
                    <label>Bitiş Tarihi Olsun Mu?</label>
                </div>

                <div id="finishDateDisplay" @if ($quiz->finish_at != null) style="display: block" @else style="display: none" @endif class="form-group">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finish_at" id="finish_at" class="form-control" @if ($quiz->finish_at) value="{{ date('Y-m-d\TH:i' , strtotime($quiz->finish_at))  }}" @endif>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quiz Güncelle</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="js">
        <script>
            $('#chkFinishDate').change(function(){
                if ($('#chkFinishDate').is(':checked')){
                    $('#finishDateDisplay').show();
                }
                else{
                    $('#finishDateDisplay').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>

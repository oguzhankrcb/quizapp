<x-app-layout>
    <x-slot name="header">Quiz Oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.store')}}">
                @csrf

                <div class="form-group">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <textarea rows="4" name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="chkFinishDate">
                    <label>Bitiş Tarihi Olsun Mu?</label>
                </div>

                <div id="finishDateDisplay" style="display: none" class="form-group">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finish_at" id="finish_at" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quiz Oluştur</button>
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

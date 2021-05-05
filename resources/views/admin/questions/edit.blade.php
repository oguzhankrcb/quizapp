<x-app-layout>
    <x-slot name="header">Soru Düzenle</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('questions.update', [$quiz->id,$question->id])}}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label>Soru</label>
                    <textarea rows="4" name="question" id="question" class="form-control">{{ $question->question }}</textarea>
                </div>

                <div class="form-group">
                    <label>Cevap 1</label>
                    <input type="text" name="answer1" id="answer1" class="form-control" value="{{ $question->answer1 }}">
                </div>

                <div class="form-group">
                    <label>Cevap 2</label>
                    <input type="text" name="answer2" id="answer2" class="form-control" value="{{ $question->answer2 }}">
                </div>

                <div class="form-group">
                    <label>Cevap 3</label>
                    <input type="text" name="answer3" id="answer3" class="form-control" value="{{ $question->answer3 }}">
                </div>

                <div class="form-group">
                    <label>Cevap 4</label>
                    <input type="text" name="answer4" id="answer4" class="form-control" value="{{ $question->answer4 }}">
                </div>

                <div class="form-group">
                    <label>Doğru Cevap</label>
                    <input type="text" name="correct_answer" id="correct_answer" class="form-control" value="{{ $question->correct_answer }}">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Soru Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

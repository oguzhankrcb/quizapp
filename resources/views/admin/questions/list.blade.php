<x-app-layout>
    <x-slot name="header">
        Sorular
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('questions.create', $quiz->id)}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Soru Oluştur</a>
                {{ $quiz->title }}'a ait sorular
            </h5>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Soru</th>
                    <th scope="col">Cevap 1</th>
                    <th scope="col">Cevap 2</th>
                    <th scope="col">Cevap 3</th>
                    <th scope="col">Cevap 4</th>
                    <th scope="col">Dogru Cevap</th>
                    <th scope="col">İşlemler</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $q)
                    <tr>
                        <th>{{$q->question}}</th>
                        <td>{{$q->answer1}}</td>
                        <td>{{$q->answer2}}</td>
                        <td>{{$q->answer3}}</td>
                        <td>{{$q->answer4}}</td>
                        <td>{{$q->correct_answer}}</td>
                        <td>

                            <form method="POST" action="{{ route('questions.destroy', [$quiz->id, $q->id]) }}">
                            @csrf
                            @method('DELETE')
                            <div style="width: 100px;">
                                <a href="{{route('questions.edit', [$quiz->id, $q->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </div>

                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>

        </div>
    </div>
</x-app-layout>

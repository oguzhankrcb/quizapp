<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Quiz Oluştur</a>
            </h5>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Quiz Adı</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $q)
                    <tr>
                        <th>{{$q->title}}</th>
                        <td>{{$q->status}}</td>
                        <td>{{$q->finish_at}}</td>
                        <td>

                            <form method="POST" action="{{ route('quizzes.destroy', $q->id) }}">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('questions.index', $q->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                            <a href="{{route('quizzes.edit', $q->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>

                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>

        </div>
    </div>
</x-app-layout>

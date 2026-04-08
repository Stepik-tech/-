@extends('layouts.app')

@section('content')
<div class="app-content app-content--sidebar">
    <div class="app-content-body">
        <h5 class="app-content-body-title">Список организаций</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: %">ID</th>
                                        <th scope="col" style="width: 10%">Название</th>
                                        <th scope="col" style="width: 10%">Лидер</th>
                                        <th scope="col" style="width: 10%">Банк</th>
                                        <th scope="col" style="width: 10%">Материалы</th>

                                        <th scope="col" style="width: 10%">Ранг №1</th>
                                        <th scope="col" style="width: 10%">Ранг №2</th>
                                        <th scope="col" style="width: 10%">Ранг №3</th>
                                        <th scope="col" style="width: 10%">Ранг №4</th>
                                        <th scope="col" style="width: 10%">Ранг №5</th>
                                        <th scope="col" style="width: 10%">Ранг №6</th>
                                        <th scope="col" style="width: 10%">Ранг №7</th>
                                        <th scope="col" style="width: 10%">Ранг №8</th>
                                        <th scope="col" style="width: 10%">Ранг №9</th>
                                        <th scope="col" style="width: 10%">Ранг №10</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orgs as $org)
                                    <tr>
                                        <td>{{ $org->ID }}</td>
                                        <td>{{ $org->Name }}</td>
                                        <td>{{ $org->Leader }}</td>
                                        <td>{{ $org->Bank }} $</td>
                                        <td>{{ $org->Mats }} шт</td>
                                        <td>{{ $org->Rank_1 }}</td>
                                        <td>{{ $org->Rank_2 }}</td>
                                        <td>{{ $org->Rank_3 }}</td>
                                        <td>{{ $org->Rank_4 }}</td>
                                        <td>{{ $org->Rank_5 }}</td>
                                        <td>{{ $org->Rank_6 }}</td>
                                        <td>{{ $org->Rank_7 }}</td>
                                        <td>{{ $org->Rank_8 }}</td>
                                        <td>{{ $org->Rank_9 }}</td>
                                        <td>{{ $org->Rank_10 }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Общее количество организаций: {{ $orgs->count() }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

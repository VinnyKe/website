    <div class="panel-body">
        @include('common.errors')

        <form action="/questionnaire" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="questionnaire" class="col-sm-3 control-label">Questionnaire</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="questionnaire-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn">
                        Add Questionnaire
                    </button>
                </div>
            </div>
        </form>

        @if (count($questionnaires) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Questionnaires
            </div>

            <div class="panel-body">
                <table class="table table-striped questionnaire-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Questionnaire</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($questionnaires as $questionnaire)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $questionnaire->name }}</div>
                                </td>

                                <td>
                                    <form action="/questionnaire/{{ $questionnaire->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>Delete Questionnaire</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
@endsection

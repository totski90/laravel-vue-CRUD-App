<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Vue CRUD</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- toaster notification -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div id="vue-wrapper">
            <div class="content">
                <h2>Laravel Vue CRUD App</h2>
                <div class="form-group" style="text-align: left;">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" 
                    required v-model="newItem.name" placeholder=" Enter some name">
                </div>

                <div class="form-group" style="text-align: left;">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" 
                    required v-model="newItem.age" placeholder=" Enter your age">
                </div>

                <div class="form-group" style="text-align: left;">
                    <label for="profession">Profession:</label>
                    <input type="text" class="form-control" id="profession" name="profession"
                    required v-model="newItem.profession" placeholder=" Enter your profession">
                </div>

                <button type="button" class="btn btn-primary btn-block" @click="createItem" id="name" name="name">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </button>

                <div class="table table-borderless" id="table">
                    <table class="table table-borderless" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Profession</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tr v-for="item in items">
                            <td>@{{ item.id }}</td>
                            <td>@{{ item.name }}</td>
                            <td>@{{ item.age }}</td>
                            <td>@{{ item.profession }}</td>

                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" :data-target="'#'+item.id" @click="setVal(item.id, item.name, item.age, item.profession)">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                </button>
                            </td>                            

                            <td>                                
                                <button class="btn btn-danger btn-sm" @click.prevent="deleteItem(item)">
                                    <i class="glyphicon glyphicon-trash"></i> Delete
                                </button>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>

            <!-- Edit Modal -->
            @include('edit-modal')

        </div>
    </div>

    <!-- JS Files -->
    <script src="{{ asset('js/vue-js/axios.js') }}"></script>
    <script src="{{ asset('js/vue-js/vue2.1.3.js') }}"></script>    
    <script src="{{ asset('js/vue-js/person.js') }}"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- toaster notification -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <title> Laravel 8 Form Validation - Programming Fields</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-2">
       <form action="{{url('user/create')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-4 m-auto p-0">
                    <div class="card shadow">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('failed')}}
                            </div>
                        @endif

                        <div class="card-header">
                            <h6 class="card-title font-weight-bold">Singin </h6>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"> Name <span class="text-danger"> * </span> </label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" onKeyPress="return withoutspecialnumeric(event)"/>
                                    {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="form-group">
                                <label for="email"> Email <span class="text-danger"> * </span> </label>
                                    <input type="text" name="email" class="form-control" value="{{old('email')}}" />
                                    {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="form-group">
                                <label for="phone"> Phone <span class="text-danger"> * </span></label>
                                    <input type="text" maxlength="10" name="phone" class="form-control" value="{{old('phone')}}" onkeypress="return isNumberKey(evt);" />
                                    {!!$errors->first("phone", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="form-group">
                                <label for="password"> Password <span class="text-danger"> * </span></label>
                                    <input type="password" name="password" class="form-control" value="{{old('password')}}" />
                                    {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                            </div>

                          
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Register </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script type="text/javascript">
          
      function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
        return true;
      }
      function withoutspecialnumeric(evt)
      {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if((64 < charCode && charCode < 91) || (96 <charCode && charCode< 123) || (charCode==32) || charCode == 8  || charCode == 46)
        {
          return true;
        }else
        {
          return false;
        }
      }
        </script>
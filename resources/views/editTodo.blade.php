<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-5">
        <div class="row">
          <table>
              <tr>
                  <td>Sales</td>
                  <td>jumlah</td>
                  <td>item</td>
              </tr>
              <tr class="table">
                  <td>{{$data->sales}} </td>
                  <td>{{$data->jumlah}}</td>

                  <td>
                    <div class="w-100 btn-group mb-5" role="group" aria-label="Basic checkbox toggle button group mb-2">
                      @foreach ($array as $item)
                      <input type="checkbox" name="item[]" value="{{$item}} " class="btn-check" id="btncheck1" autocomplete="off">
                      <label class="btn btn-outline-primary" for="btncheck1">{{$item}}</label>
                      @endforeach
                    </div>

                  </td>

              </tr>
          </table>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
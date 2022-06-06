<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  </head>
  <body>
    <div id="app" class="container mt-5 w-25">
        <form action="tambahLara" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
                <input type="text" name="sales" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Jumlah</span>
                <input type="text" name="jumlah" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="w-100 btn-group mb-5" role="group" aria-label="Basic checkbox toggle button group mb-2">
                <input type="checkbox" name="item[]" value="sepatu" class="btn-check" id="btncheck1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck1">Sepatu</label>
              
                <input type="checkbox"name="item[]" value="tas" class="btn-check" id="btncheck2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck2">Tas</label>
              
                <input type="checkbox"name="item[]" value="baju" class="btn-check" id="btncheck3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck3">Baju</label>
              </div>
              <div class="d-grid">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <table>
        <tr>
            <td>Nama</td>
        </tr>
        @foreach ($data as $item)
            <tr>
            <td><a href="edit/{{$item->id}}">{{$item->item}}</a></td>
            </tr>
        @endforeach

    </table>
      <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
      <script>
        var app = new Vue({
          el: '#app',
          data: {
            message: 'Hello Vue!',
            dataList:['satu','dua'],
            cobaModel:[],
            users:[],
            updateSubmit: false,
            form: {
              id:'',
              sales:'',
              jumlah:'1',
              item:[],
            }
         },
          methods:{
            increment(){
              this.form.jumlah++;
            },
            decrement(){
              this.form.jumlah--;
            },
            count(){
              this.load().length;
            },
            batal(){
              this.updateSubmit=false;
              this.form.sales ='';
              this.form.jumlah ='1';
              this.form.item ='';
            },
            load(){
              axios.get('/api/index')
              .then(response=>{
                console.log(response);
                this.users = response.data;
              })
            },
            simpanData(){
              axios.post(('/api/tambah'),this.form).then(response=>{
                this.load();
                this.form.sales ='';
                this.form.jumlah ='1';
                this.form.item ='';

              })
              .catch(err=>{
              });
            },
            edit(item){
              this.updateSubmit = true;
              this.form.id = item.id;
              this.form.sales = item.sales;
              this.form.jumlah = item.jumlah;
              this.form.item = item.item;

            },
            del(item){
              axios.get('api/hapus/'+item.id)
              .then(()=>{
                this.load();
              })
            },
            update(form){
              axios.post(('api/update/'+form.id),this.form)
              .then((response)=>{
                this.load();
              })
              // alert(this.form.id)
            }
          },
          
          mounted(){
            this.load()
          },
          })
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  </body>
</html>
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
    <div id="app">
      <table>
        <tr>
          {{-- <input v-model="cobaModel" type="text" value="ada" name="" id=""> --}}
          <input type="checkbox" value="sepatu" id="sepatu" v-model="cobaModel" >
          <label for="sepatu">sepatu</label>
          <input type="checkbox" value="baju" id="baju" v-model="cobaModel" >
          <label for="baju">baju</label><br>

          @{{cobaModel}}
        </tr>
        <div class="container">
          <div class="row mt-5">
              <div class="col">
                @{{checked}}
                Jumlah Penjualan : @{{users.length}}
                <form >
                @csrf
                  <div class="input-group input-group-sm mb-3 w-100">
                      {{-- <input type="text" v-model="form.id" class="form-control me-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="sales"> --}}
                      <span class="input-group-text" id="inputGroup-sizing-sm">Nama Sales</span>
                      <input type="text" v-model="form.sales" class="form-control me-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="sales">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Jumlah</span>
                      <button type="button" @click="form.jumlah--" class="btn btn-success input-group-text" id="inputGroup-sizing-sm">-</button>
                      <input type="number" v-model="form.jumlah" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="jumlah">
                      <button type="button" @click="form.jumlah++" class="btn btn-success input-group-text me-2" id="inputGroup-sizing-sm">+</button>
                      <label class="input-group-text" for="inputGroupSelect01">Item</label>
                      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" v-model="form.item" value="sepatu" class="btn-check" id="btncheck1" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck1">Sepatu</label>
                      
                        <input type="checkbox" v-model="form.item"  value="tas" class="btn-check" id="btncheck2" autocomplete="off" >
                        <label class="btn btn-outline-primary" for="btncheck2">tas</label>
                      
                        <input type="checkbox" v-model="form.item"  value="baju"class="btn-check" id="btncheck3">
                        <label class="btn btn-outline-primary" for="btncheck3">baju</label>
                      </div>                      
                      {{-- <input type="text" v-model="form.item" class="form-control me-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="item"> --}}
                      <button type="button" v-show="!updateSubmit" @click="simpanData()" class="btn btn-primary px-5 ">Add</button>
                      <button type="button" v-show="updateSubmit" @click="update(form)" class="btn btn-primary px-5 ">Update</button>
                      <button type="button" v-show="updateSubmit" @click="batal()" class="btn btn-danger px-5 ">batal</button>

                  </div>
                </form>
              </div>
          </div>
      </div>
      </table>
      <div class="container">
        <div class="row">
          <table class="table table-striped">
            <thead>
              <td>No.</td>
              <td>Nama Sales</td>
              <td>Jumlah</td>
              <td>item</td>
              <td class="text-center">action</td>
            </thead>
            <tr v-for="(item,i) in users">
              <td>@{{i+1}}. </td>
              <td>@{{item.sales}}</td>
              <td>@{{item.jumlah}}</td>
              <td>@{{item.item}}</td>
              <td class="text-center"><button type="button" v-on:click="edit(item)" class="btn btn-primary me-2 w-25">Edit</button><button type="button" v-on:click="del(item)" class="btn btn-danger w-25">Hapus</button></td>

            </tr>
          </table>
        </div>
      </div>
    </div>
      <div class="container">
          <div class="row mt-5">
              <div class="col">
              </div>
          </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
      <script>
        var app = new Vue({
          el: '#app',
          data: {
            checked:'checked',
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
            count(){
              this.load().length;
            },
            batal(){
              this.updateSubmit=false;
              this.form.sales ='';
              this.form.jumlah ='1';
              this.form.item =[];
            },
            load(){
              axios.get('/api/index')
              .then(response=>{
                // console.log(response);
                this.users = response.data;
              })
            },
            simpanData1(){
              axios.post(('/api/tambah'),this.form).then(response=>{
                this.load();
                this.form.sales ='';
                this.form.jumlah ='1';
                this.form.item ='';
              })
              .catch(err=>{
              });
            },
            simpanData(){
              if (confirm('apakah anda yakin akan menambahkan data?')) {
                this.simpanData1();
              }
              else{
                alert('anda telah membatalkan input data');
              }
            },

            edit(item){
              axios.get('api/edit/'+item.id)
              .then(response=>{
              this.updateSubmit = true;
              this.form.id = response.data.data.id;
              this.form.sales=response.data.data.sales;
              this.form.jumlah=response.data.data.jumlah;
              })

              // this.updateSubmit = true;
              // this.form.id = item.id;
              // this.form.sales = item.sales;
              // this.form.jumlah = item.jumlah;

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
                this.updateSubmit = false;
                this.form.sales ='';
                this.form.jumlah ='1';
                this.form.item = '';



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
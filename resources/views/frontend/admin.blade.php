
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Admin</title>
    <link href="{{asset('frontend/css/admin.css') }}" rel="stylesheet" />

    <link href="{{asset('frontend/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="navv">

        <ul>

            <li><a href="">Anasayfa</a></li>
        

        </ul>

    </div>
    <br /><br />
    <div class="esenler">
        <h1>Esenlerden Haberler</h1>
        <hr />
        <form style="width:500px; margin-left:10%">
            <div class="form-group">
                <label for="exampleInputEmail1">BAŞLIK</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Başlığı Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">RESİM</label>
                <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
                <label for="exampleInputPassword1">METİN</label>

                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">KAYDET</button>
        </form>
    </div>
    


    <br /><br />
    <div class="esenler">
        <h1>SLİDER</h1>
        <hr />
        <form style="width:500px; margin-left:10%">
            <div class="form-group">
                <label for="exampleInputEmail1">BAŞLIK</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Başlığı Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">RESİM</label>
                <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
                <label for="exampleInputPassword1">METİN</label>

                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">KAYDET</button>
        </form>
    </div>




    <br /><br />
    <div class="esenler">
        <h1>ESENLER GALERİ</h1>
        <hr />
        <form style="width:500px; margin-left:10%">
        
            <div class="form-group">
                <label for="exampleInputPassword1">RESİM</label>
                <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
          
            <button type="submit" class="btn btn-primary">KAYDET</button>
        </form>
    </div>


</body>
</html>

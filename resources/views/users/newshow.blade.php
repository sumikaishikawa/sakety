<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 
    <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript">
    function check() {
        console.log("表示テスト");
        if (window.confirm('入力しますか？')) {
            $('[name=result]').val('名前:' + $('input[name=name]').val() + "\n"  + 
                                   'カラー選択:' + $('input[name=colorpicker]').val() + "\n"
            );
        }
    }
    </script>
</head>  
<body>
<body>
<div class="container">
 

 
        <!-- main -->
        <div class="col-md-9">
            <!-- apply custom style -->
            <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
            <h1><small>Post</mall></h1>
            </div>
 
            <form method="post" action="" class="form-horizontal">
 
                <!-- name \\
                -->
                <div class="form-group">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-sm-5">
                        <input type="text" name="Title" class="form-control" placeholder=""> 
                        <p class="help-block" >Please put the title here.</p>
                    </div>
                </div>
                
                <!-- input result  -->
                <div class="form-group">
                    <label class="col-md-2 control-label">What</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="result" rows=3 ></textarea>
                    </div>
                </div>
                
                 <!-- select -->
                <div class="form-group">
                    <label class="col-md-2 control-label">Deadline</label>
                    <div class="col-md-5">
                        <select name="area" class="form-control">
                            <option value="関東">7/28</option>
                            <option value="関西">9/6</option>
                        </select>
                    </div>
                </div>
 
                <!-- select -->
                <div class="form-group">
                    <label class="col-md-2 control-label">Place</label>
                    <div class="col-md-5">
                        <select name="area" class="form-control">
                            <option value="関東">Tokyo</option>
                            <option value="関西">Hakata</option>
                        </select>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-md-2 control-label">Free Coment</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="result" rows=3 ></textarea>
                    </div>
                </div>
                
                <!-- submit  -->
                 <div class="form-group">
                    <div class="col-md-offset-3">
                        <input type="button" value="Submit" class="btn btn-primary" onClick="check()">
                    </div>
                </div>
           </form>
        </div>
    </div>
</div>
 
</html>
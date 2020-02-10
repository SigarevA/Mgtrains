<?php
    require("head.php");
?>
<head>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
    
    <div class="container margininfo">

        <form action="" name="form-departure">
            <div class="row justify-content-around">
                <div class="">
                    <span class="label">Название станции отправления : </span>
                    <input type="text" name="opt" class="form-control">
                    <select class="form-control">
                        <?php
                            require("includes/connect_bd.php");
                            $query = "SELECT name FROM station";
                            $result = mysqli_query($link, $query);
                            while( $row = mysqli_fetch_assoc($result)) {
                                echo "<option>" . htmlspecialchars($row["name"] , ENT_HTML5) . "</option>";
                            }
                        ?>
                    </select> 
                </div>
                <div class="">
                    <span class="label">Название станции назначения : </span>
                    <input type="text" name="opt" class="form-control">
                    <select class="form-control">
                    </select> 
                </div>
                <div>
                <label><span>Дата</span> : <br/><input class="form-control" type="text" id="datepicker"></label>              
                </div>
            </div>
                <div class="margin_top">
                    <button class="btn  btn-block btn-outline-success"> Подобрать 
                </button>
            </div>
        </form>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$( function() {
    $( "#datepicker" ).datepicker();
});
</script>

<!--<form action="http://" name="f">
<select class="form-control" name="name_ob" size="1">
<option value="214">Nissan</option>
<option value="215">Toyota</option>
<option value="40">Новооскольский филиал</option>
<option value="42">НоваяФирма</option>
<option value="92">Агрохолдинг какой-то</option>
<option value="93">Агрохолдинг другой</option>
<option value="42">НоваяФирма</option>
<option value="92">Агрохолдинг какой-то</option>
<option value="93">Агрохолдинг другой</option>
<option value="42">НоваяФирма</option>
<option value="92">Агрохолдинг какой-то</option>
<option value="93">Агрохолдинг другой</option>
<option value="42">НоваяФирма</option>
<option value="92">Агрохолдинг какой-то</option>
<option value="93">Агрохолдинг другой</option>
</select>
<input type="text" name="opt">
<p></p>
</form>
<script>
var f = document.forms["f"],
    s = f["name_ob"], o = s.querySelectorAll("option"),
    inp = f["opt"],
    reg;
inp.oninput = function() {
    reg = new RegExp(this.value, "ig");  //если искать только в начале  "^" + this.value, "ig"
    s.options.length = 0;
    for (var i=0; i<o.length; i++)  {
       reg.test(o[i].text) && s.options.add(o[i]);
       reg.lastIndex = 0;
    }
};

</script>
--> 
    </div>

</body>
<?php
    require("head.php");
    if(!$_SESSION["user_id"]) {
        header("Location: http://mgtrains.com/");
    }
?>

<?php
    if( isset($_GET["what"])) 
    {
?>
        <div class="container">
            <?php
                if($_GET["what"] == 'branch') 
                {
            ?>
                    <h3>Формирование ветки</h3>

                    <form id="formbranch">
                        <div class="form-group">
                            <span class="label">Название первой станции : </span>
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
                        <div class="form-group">
                            <span class="label">Название второй станции : </span>
                            <input type="text" name="opt" class="form-control">
                            <select class="form-control">
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Протяженность : </label>
                            <input type="text" name="length" class="form-control" id="length" placeholder="км">
                        </div>
                        <button class="btn btn-success" id="send_carriage">Добавить</button>
                    </form>
                    <script>
                        document.getElementById('formbranch').addEventListener('submit', check_fill_branch);

                        function check_fill_branch(e) {

                            if (document.getElementById('length').value === '') {
                                e.preventDefault();
                                alert("Заполните поле \'Протяженность\'");
                                document.getElementById('length').focus();
                                return false;
                            }
                            var reg = x
                        }
                    </script>
            <?php
                }
            ?>


            <?php
                if( $_GET["what"] == 2) 
                {
            ?>
                    <h3>Формирование состава</h3>
            <?php
                }
            ?>
        </div>
<?php
    }
?>
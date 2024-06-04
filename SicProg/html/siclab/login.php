<?php
    $host = 'localhost';
    $dbUsername = 'root';
    $dbpw = 'password';
    $db = 'siclab';

    // * INPUT
    $name = $_POST['Name'];
    $pass = $_POST['password'];

    if(!empty($name) && !empty($pass)){
        $conn = new mysqli($host,$dbUsername,$dbpw,$db);        // DATABASE CONNECTION
        if ($conn->connect_error) {
            die("Conn failed: ".$conn->conncet_error);
        }
        else{
            $qry = "SELECT * FROM users WHERE Nome = '".$name."' AND password = '".$pass."'";

            // Esecuzione della query multipla
            if ($conn->multi_query($qry)) {
                do {
                    // ! REPAIR HERE - gestione del echo 
                    if ($result = $conn->store_result()) {
                        while ($row = $result->fetch_assoc()) {
                            // Elabora i risultati della query
                            // Esempio: $row['campo'] contiene il valore del campo specificato
                            echo "row: ".$row;
                            //echo "Benvenuto ".$name." - Ecco il tuo saldo Bancario: 10k €";
                        }
                        $result->free();
                    }
                } while ($conn->next_result());
            } else {
                echo "Errore nella query: " . $conn->error;
            }



            /*
            $query = mysqli_query($conn, $qry);
            if ($query) {
                echo "Benvenuto ".$name."Ecco il tuo saldo Bancario: 10k €";
                $row = mysqli_fetch_assoc($query);
                if ($row) {
                    $username = $row['Nome'];
                    $password = $row['Password'];
                } else {
                    // Nessun risultato trovato
                    echo "Nessun risultato trovato.";
                }
            } else {
                // Errore nella query
                echo "Errore nella query: " . mysqli_error($conn);
            }
            */
            $conn->close();
        }
    }
    
?>
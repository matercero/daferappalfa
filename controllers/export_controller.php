<?php

class ExportController extends AppController {

    var $name = 'Export';

    public function index() {
        
        $vartemcon = $this->Export->find('all');
                
    }

//index

    public function create() {
        // database "definition"

        $def = array(
            array("TIPREG", "C", 1),
            array("DOCFEC", "D"),
            array("DOCSER", "C", 2),
            array("DOCNUM", "C", 6),
            array("CODTIP", "C", 2),
            array("CODMOD", "C", 2),
            array("CODTER", "C", 5),
            array("CTACON", "C", 12),
            array("BASEBAS", "N", 10, 2),
            array("IMPTBAS", "N", 10, 2),
            array("PORNOR", "N", 6, 2),
            array("RECBAS", "N", 10, 2),
            array("PORREC", "N", 6, 2),
            array("PORTES", "N", 11, 2),
            array("PORFIN", "C", 6),
            array("RFDPP", "N", 11, 2),
            array("DESHOR", "N", 11, 2),
            array("DESKM", "N", 11, 2),
            array("TOTFAC", "C", 14),
            array("FECVTO1", "C", 8),
            array("IMPVTO1", "C", 10),
            array("FECVTO2", "C", 8),
            array("IMPVTO2", "C", 10),
            array("FECVTO3", "C", 8),
            array("IMPVTO3", "C", 10),
            array("FECVTO4", "C", 8),
            array("IMPVTO4", "C", 10),
            array("FECVTO5", "C", 8),
            array("IMPVTO5", "C", 10),
            array("FECVTO6", "C", 8),
            array("IMPVTO6", "C", 10),
            array("DIETENT", "N", 10, 2),
            array("CODFORPAG", "C", 3),
            array("TIPFORPAG", "C", 1)
        );

        // creation
        $dbf_file = '../TEMCON_' . date('Ymd') . '.dbf';
        if (!dbase_create($dbf_file, $def)) {
            echo "Error, creando el fichero TEMCON \n";
        } else {
            echo "OK, Create file = " . $dbf_file;
        }
        // $this->redirect(array('action' => 'index'));
    }

//    public function add() {
//        // abrir en modo lectura-escritura
//        $db = dbase_open('../tmp/TEMCON.dbf', 2);
//
//        if ($db) {
//            dbase_add_record($db, array(
//                date('Ymd'),
//                'Maxim Topolov',
//                '23',
//                'max@example.com',
//                'T'));
//            dbase_close($db);
//            echo "OK, ADD the database\n";
//        }
//        $this->redirect(array('action' => 'index'));
//    }
}

?>

<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
   <div class="row m-3" id="school_form">
       <div class="col">
           <form action="/main/compform/add" method="POST">
               <label for="competition_name"><h2>Wybierz zawody</h2></label><br>
               <select id="competition_name" class="custom-select custom-select-lg mb-1 w-50" name="zawody_id">
               <?php foreach($competitiondata as $row) :?>
                    <option value="<?= $row->zawody_id?>"><?= $row->nazwa?></option>
                <?php endforeach; ?>
               </select><br>
               <label for="competitor_name"><h4>Imie</h4></label>
               <input id="competitor_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Imie" name="imie">
               <label for="competitor_surname"><h4>Nazwisko</h4></label>
               <input id="competitor_surname" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwisko" name="nazwisko">
               <label for="competitor_date"><h4>Data Urodzenia</h4></label>
               <input id="competitor_date" class="form-control form-control-lg mb-4 w-50" type="date" name="dataur" >
               <label for="competitor_school"><h4>Szkoła</h4></label><br>
               <select id="competitor_school" class="custom-select custom-select-lg mb-4 w-50" name="szkola_id">
               <?php foreach($schooldata as $row) :?>
                    <option value="<?= $row->szkola_id?>"><?= $row->nazwa?></option>
                <?php endforeach; ?>
               </select><br>
               <input type="submit" value="ZATWIERDŹ" class="btn btn-secondary" />
           </form>
       </div>
   </div>

<?= $this->endSection() ?>
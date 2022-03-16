<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
   <div class="row m-3" id="school_form">
       <div class="col"><h2>Wybierz Zawody</h2>
           <select id="school_picker" class="custom-select custom-select-lg mb-4 w-50">
               <option value="0">Zawody 1-3 2022(Z BAZY)</option>
           </select>
           <hr>
           <form action="*" method="POST">
               <label for="competitor_name"><h4>Imie</h4></label>
               <input id="competitor_name" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Imie">
               <label for="competitor_surname"><h4>Nazwisko</h4></label>
               <input id="competitor_surname" class="form-control form-control-lg mb-4 w-50" type="text" placeholder="Nazwisko">
               <label for="competitor_date"><h4>Data Urodzenia</h4></label>
               <input id="competitor_date" class="form-control form-control-lg mb-4 w-50" type="date" >
               <label for="competitor_school"><h4>Szkoła</h4></label><br>
               <select id="competitor_school" class="custom-select custom-select-lg mb-4 w-50">
                   <option value="0">ZSTIO (Z BAZY)</option>
                   <option value="1">Kraków</option>
               </select><br>
               <input type="submit" value="ZATWIERDŹ" class="btn btn-secondary" />
           </form>
       </div>
   </div>

<?= $this->endSection() ?>
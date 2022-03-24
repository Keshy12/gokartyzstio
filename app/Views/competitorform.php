<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
<?php if(isset($_SESSION['validation'])) : ?>
        <div class="text-danger">
            <?= $_SESSION['validation']?>
        </div> 
        <?php unset($_SESSION['validation']) ?>
    <?php endif; ?> 
   <div class="row m-3" id="school_form">
       <div class="col">
           <form action="/main/compform/add" method="POST">
               <label for="competition_name"><h2>Wybierz zawody</h2></label><br>
               <select id="competition_name" class="custom-select custom-select-lg mb-1 w-100" name="zawody_id">
               <?php foreach($competitiondata as $row) :?>
                    <option value="<?= $row->zawody_id?>"><?= $row->nazwa?></option>
                <?php endforeach; ?>
               </select><br>
               <label for="competitor_name"><h4>Imie</h4></label>
               <input id="competitor_name" class="form-control form-control-lg mb-4 w-100" type="text" placeholder="Imie" name="imie">
               <label for="competitor_surname"><h4>Nazwisko</h4></label>
               <input id="competitor_surname" class="form-control form-control-lg mb-4 w-100" type="text" placeholder="Nazwisko" name="nazwisko">
               <label for="competitor_date"><h4>Data Urodzenia</h4></label>
               <input id="competitor_date" class="form-control form-control-lg mb-4 w-100" type="date" name="dataur" >
               <label for="competitor_school"><h4>Szkoła</h4></label><br>
               <select id="competitor_school" class="custom-select custom-select-lg mb-4 w-100" name="szkola_id">
               <?php foreach($schooldata as $row) :?>
                    <option value="<?= $row->szkola_id?>"><?= $row->nazwa?></option>
                <?php endforeach; ?>
               </select><br>
               <div class="form-check">
                   <input type="checkbox" class="form-check-input" id="rules_form_check" required>
                   <label class="form-check-label" for="rules_form_check">Akceptuje regulamin zawodów.</label>
               </div><br>
               <input type="submit" value="ZATWIERDŹ" class="btn btn-success" />
           </form>
       </div>
        <div class="col">
            <h2>Regulamin</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et viverra tellus. Integer eget ante sit amet leo convallis viverra. Vestibulum vehicula ac dolor quis fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at nisl nec mauris egestas laoreet. Morbi a nibh a sapien finibus elementum. Curabitur vitae pulvinar arcu, eu porttitor lorem. Sed varius luctus urna vitae commodo. Quisque ut dignissim turpis. In hac habitasse platea dictumst. Integer in mattis lorem. Sed molestie mollis enim, eget facilisis nibh.
                Sed vel eros efficitur, convallis lectus sit amet, rhoncus tortor. Integer vitae nisi luctus, viverra eros ac, suscipit mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce eros justo, elementum et ex ut, condimentum suscipit justo. Donec placerat nunc ut dolor scelerisque aliquet. Suspendisse potenti. Nunc vestibulum tellus quis felis accumsan accumsan. Nunc ornare sit amet quam ut eleifend. Vestibulum auctor, lorem eu commodo vestibulum, sem mauris rhoncus ante, ullamcorper condimentum odio leo ut nunc.
                Sed suscipit, urna quis condimentum mattis, est nulla tristique quam, sit amet varius metus eros ac magna. Nulla tristique, sapien ut malesuada tincidunt, sapien augue dignissim elit, vitae accumsan orci nisi quis velit. Vivamus congue venenatis nisl, et porttitor leo ultricies et. Vivamus risus sem, scelerisque posuere aliquam et, aliquet sit amet sem. Donec et justo eget augue placerat eleifend. Nulla non nisi a quam pellentesque egestas. Nam maximus consequat orci a euismod. Quisque auctor mollis lectus at euismod. Praesent tincidunt feugiat massa non laoreet.
                Cras sapien turpis, molestie quis metus a, sodales porttitor nisi. Nunc aliquet, justo nec luctus ullamcorper, eros eros vehicula nisi, eget mollis magna enim sed velit. Pellentesque quis egestas sem. Quisque malesuada tortor cursus, varius neque vitae, pretium lorem. Pellentesque quis justo eget enim convallis rhoncus. Cras condimentum sed eros eu vestibulum. Curabitur nunc orci, mattis non odio nec, rutrum eleifend diam. </p>
        </div>
   </div>

<?= $this->endSection() ?>
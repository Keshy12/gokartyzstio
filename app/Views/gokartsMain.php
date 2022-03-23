<?= $this->extend('layouts/main')?>
<?= $this->section('content')?>
    <div class="container-fluid text-center pl-5 pr-5">
        <div class="row mt-3">
            <div class="col">
                <h1 class="fw-bolder mb-3">ZAWODY KARTINGOWE „ŚLADAMI ROBERTA KUBICY”</h1>
                    <figure class="mb-4"><img class="img-fluid rounded w-75" src="/assets/images/mainPage.jpg"/></figure>
                    <section class="mb-5 text-justify">
                        <p>ZSTiO Limanowa słynie z wysokiego poziomy nauczania zawodowego wielu profilu technicznych, jednym z nich jest technik pojazdów samochodowych. W celu promocji tego profilu Nasza szkoła decyduje się na organizację zawodów sportowych o nazwie "Śladami Roberta Kubicy".  </p>
                        <p>Interesują cię gokarty? Myślisz, że to czas aby wygrać puchary? Chcesz spróbować swoich sił? Dołącz do nas! Uczestnikami zawodów może być każdy uczeń Naszej szkoły, bądź uczeń szkoły zaprzyjaźnionej.</p>
                        <p>Zawody kartingowe są idealną okazją aby odnaleźć w sobie ukryty talelent kierowcy, sprawdzić swoje umiejętności, wzbudzić w sobie pasję do motoryzacji lub po prostu dobrze się bawić. Zawody są darmowe, odbywają się one dla różnych grup wiekowych, aby zachować balans umiejętności pomiędzy zawodnikami.</p>
                        <p>Baczne oko sędziów jak zarówno zaangażowanych opiekunów czuwa nad bezpieczeństwem i dokładnością przebiegu rywalizacji.</p>
                    </section>
                        <h4 class=" mt-3">Spróbuj swoich sił!</h4>
                        <p>W celu zapisania się na zawody skontaktuj się z nami.</p>
            </div>
        </div>
    </div>



    <div id="container">

    <?php if(isset($validation)) : ?>
        <div class="text-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php print_r($_POST) ?>
    </form>
    </div>
<?= $this->endSection() ?>
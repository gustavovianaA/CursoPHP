<footer class="p-5 text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>UnSet</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent">
                        <a href="<?= URL ?>" data-toggle="tooltip" title="Página Inicial">Home</a>
                    </li>
                    <li class="list-group-item bg-transparent">
                        <a href="<?= URL ?>/paginas/sobre" data-toggle="tooltip" title="Quem Somos">Quem Somos</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Contato</h5>
                <small>
                    Fale conosco através dos meios de contato abaixo
                </small>
                <p class="mt-3"><i class="fas fa-phone mr-2"></i> <small> (00) </small>0000-0000</p>
                <p><i class="fab fa-whatsapp mr-2"></i> <small> (00) </small><a href="http://api.whatsapp.com/send?1=pt_BR&phone=55DD900000000" data-toggle="tooltip" title="Clique para iniciar uma conversa no Whatsapp">90000-0000</a></p>
                <p>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:email@unset.com.br">email@unset.com.br</a>
                </p>
            </div>
            <div class="col-md-3">
                <h5>Localização</h5>
                <div class="text-center">
                    <i class="fas fa-map-marker-alt"></i>
                    <address>
                        Avenida PHP, Nº 7, UnSet. Cidade, UF CEP: 70.400-900
                    </address>
                </div>

            </div>
            <div class="col-md-3 d-flex align-items-center">
                <h2 class="textoAnimado">UnSet</h2>
            </div>
        </div>

        <small>
            <div class="row border-top py-2 mt-3">
                <div class="col-md-9">
                    &COPY; Copyright 2020 - <?= date('Y') ?> Todos os Direito Reservados. <?= APP_NOME ?> <a href="https://www.unset.com.br" title="<?= APP_NOME ?>">www.unset.com.br</a>
                </div>
                <div class="col-md-3 text-right">
                    UnSet Versão: <?= APP_VERSAO ?>
                </div>
            </div>
        </small>
    </div>
</footer>
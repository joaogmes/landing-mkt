    <?php
    if(isset($_POST['status_cliente']) && $_POST['status_cliente'] != ''){
        $cadastro = crud('inserir','clientepf', $_POST);
        echo $cadastro;
    }
    ?>
    <div class="container padding-0">
        <div class="row">
            <div class="col-md-5">
                <h3>Cadastro de Clientes (PF)</h3>
                <p>Adição de clientes ao sistema</p>
            </div>
            <div class="col-md-7">
                <a class="btn btn-outline-info btn-lg" href="?modulo=clientepf&acao=listar" role="button"><i class="fa fa-user"></i> Listar Clientes</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form action="./?modulo=clientepf&acao=cadastrar" method="POST">
                    <input type="hidden" name="status_cliente" value="ativo">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" id="nome" required placeholder="Fulano da Silva">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="123.456.789-01">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" name="rg" id="rg" placeholder="12.345.678-9">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" placeholder="(17) 3444-0000">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" name="celular" required id="celular" placeholder="(17) 99000-0099">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="seuemail@provedor.com.br">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone">Contato Alternativo</label>
                            <input type="text" class="form-control" name="contato" id="contato" placeholder="Nome do contato">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="telcontato">Celular do Contato</label>
                            <input type="text" class="form-control" name="telcontato" id="telcontato" placeholder="(17) 99000-0099">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" name="cep" id="cep" placeholder="99.999-999">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" name="rua" id="rua" required placeholder="Rua Beltrano de Tal">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" name="numero" id="numero" required placeholder="0123">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" required placeholder="Bairro onde mora">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" required placeholder="Cidade onde mora">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                <option value="SP">SP</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PR</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-row text-center mt-5">
                        <button type="submit" id="enviar" class="btn btn-default btn-lg mx-auto">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="output"></div>
    <script>
        $(document).ready(function() {
            $("input, select", "form") // busca input e select no form
                .keypress(function(e) { // evento ao presionar uma tecla válida keypress

                    var k = e.which || e.keyCode; // pega o código do evento

                    if (k == 13) { // se for ENTER
                        e.preventDefault(); // cancela o submit
                        $(this)
                            .closest('div, .form-row, label') // seleciona a linha atual
                            .next() // seleciona a próxima linha
                            .find('input, select') // busca input ou select
                            .first() // seleciona o primeiro que encontrar
                            .focus(); // foca no elemento
                    }

                });

            $('input').each(function() {
                $(this).attr('autocomplete', 'off');
            });

            $("#cpf").mask("999.999.999-99");
            $("#telefone").mask("(99) 9999-9999");
            $("#celular").mask("(99) 99999-9999");
            $("#telcontato").mask("(99) 99999-9999");
            $("#cep").mask("99.999-999");


            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');
                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");

                        //Consulta o webservice viacep.com.br/
                        jQuery.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#numero").focus();
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });

            $("#cpf").blur(function() {
                var exp = /\.|\-/g;

                var cpf = $('#cpf').val().replace(exp, '').toString();

                if (cpf != "") {

                    if (cpf.length == 11) {

                        var v = [];

                        //Calcula o primeiro dígito de verificação.
                        v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
                        v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
                        v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
                        v[0] = v[0] % 11;
                        v[0] = v[0] % 10;

                        //Calcula o segundo dígito de verificação.
                        v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
                        v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
                        v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
                        v[1] = v[1] % 11;
                        v[1] = v[1] % 10;

                        //Retorna Verdadeiro se os dígitos de verificação são os esperados.

                        if ((v[0] != cpf[9]) || (v[1] != cpf[10])) {
                            $('#cpf').focus();
                            $("#enviar").attr('disabled', 'true');
                        } else if (cpf[0] == cpf[1] && cpf[1] == cpf[2] && cpf[2] == cpf[3] && cpf[3] == cpf[4] && cpf[4] == cpf[5] && cpf[5] == cpf[6] && cpf[6] == cpf[7] && cpf[7] == cpf[8] && cpf[8] == cpf[9] && cpf[9] == cpf[10]) {
                            $('#cpf').focus();
                            $("#enviar").attr('disabled', 'true');
                        } else {
                            $("#enviar").removeAttr('disabled');
                            // alert('CPF OK ==> ' + cpf);
                            $('#rg').focus();
                        }


                    } else {
                        $('#cpf').focus();
                            $("#enviar").attr('disabled', 'true');
                        $('#cpf').focus();
                    } // 11
                }else{
                    $("#enviar").removeAttr('disabled');
                }

            });

        })
    </script>
<label class="font-semibold mb-1">Possui Segmento?</label>
<select name="segmento" class="form-select rounded-lg p-2 text-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
    <option value="">Selecione um segmento</option>
    {{-- @foreach($segmentos as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach --}}
    <option value="1">1 - Atacado</option>
    <option value="2">2 - Automotivo Revenda</option>
    <option value="3">3 - Automotivo Assistência</option>
    <option value="4">4 - Casa e Decoração</option>
    <option value="5">5 - Coveniencia</option>
    <option value="6">6 - EPI e SIGN</option>
    <option value="7">7 - Indústria</option>
    <option value="8">8 - Joelheria</option>
    <option value="9">9 - Lanchonetes, Pizzaria e Afins</option>
    <option value="10">10 - Material de Construção</option>
    <option value="11">11 - Mercado de Proximidade</option>
    <option value="12">12 - Moda</option>
    <option value="13">13 - Móveis e Eletro</option>
    <option value="14">14 - Ótica</option>
    <option value="15">15 - Perfumaria e Cosméticos</option>
    <option value="16">16 - Presentes, Papelaria e Outros</option>
    <option value="17">17 - Suplementos e Produtos Naturais</option>
    <option value="18">18 - Loja de Instrumentos Musicais e Acessórios</option>
    <option value="19">19 - Distribuidora de Bebidas</option>
    <option value="20">20 - Salões de Beleza e Barbearias</option>
    <option value="21">21 - Feiras e Exposições</option>
    <option value="22">22 - Franquedoras</option>
    <option value="23">23 - Retíficas e Manutenção Agrícola</option>
    <option value="24">24 - Contratos</option>
    <option value="25">25 - Parafusos</option>
    <option value="26">26 - E-Commerce</option>
    <option value="27">27 - Locação</option>
    <option value="28">28 - Loja de Celulares</option>
</select>
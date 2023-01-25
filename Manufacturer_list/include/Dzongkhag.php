<select class="form-select h-100" id="Dzongkhag" name="Dzongkhag" aria-label="Dzongkhag" required>
    <?php if (isset($result['Dzongkhag'])) :?>
    <option value="<?php echo $result['Dzongkhag'];?>"><?php echo $result['Dzongkhag'];?></option>
    <?php else : ?>
    <option value=""></option>
    <?php endif; ?>
    <option value="Bumthang">Bumthang</option>
    <option value="Chukha">Chukha</option>
    <option value="Dagana">Dagana</option>
    <option value="Gasa">Gasa</option>
    <option value="Haa">Haa</option>
    <option value="Lhuntse">Lhuntse</option>
    <option value="Mongar">Mongar</option>
    <option value="Paro">Paro</option>
    <option value="Pemagatshel">Pemagatshel</option>
    <option value="Punakha">Punakha</option>
    <option value="Samtse">Samtse</option>
    <option value="Samdrup Jongkhar">Samdrup Jongkhar</option>
    <option value="Sarpang">Sarpang</option>
    <option value="Thimphu">Thimphu</option>
    <option value="Trashigang">Trashigang</option>
    <option value="Trashi Yangtse">Trashi Yangtse</option>
    <option value="Tsirang">Tsirang</option>
    <option value="Trongsa">Trongsa</option>
    <option value="Wangdue Phodrang">Wangdue Phodrang</option>
    <option value="Zhemgang">Zhemgang</option>
</select>
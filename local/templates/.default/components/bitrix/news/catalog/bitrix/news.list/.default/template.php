<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if(empty($arResult['ITEMS']))
    return;

$data = new \Lema\Template\TemplateHelper($this);

?>

<div class="container">
    <div class="catalog__list">
        <? foreach($data->items() as $item): ?>
            <div class="catalog__list__item" <?=$item->editId();?>>
                <div class="core__line_bg"></div>
                <div class="catalog__list__item__wrap">
                    <div class="catalog__list__item__main">
                        <a href="<?=$item->detailUrl();?>" title="<?=$item->getName();?>" class="catalog__list__item__img">
                            <img class="catalog__list__item__img__control" src="<?=$item->previewPicture();?>">
                            <span class="catalog__list__item__img__work">
                                <? if($item->get('OPT_LOGO')): ?>
                                    <img src="<?=$item->get('OPT_LOGO_SRC');?>" title="<?=$item->getName();?>">
                                <? endif; ?>
                            </span>
                        </a>
                        <a href="<?=$item->detailUrl();?>" title="<?=$item->getName();?>" class="catalog__list__item__text">
                            <span class="catalog__list__item__text__title"><?=$item->getName();?></span>
                            <p>
                                <?=$item->previewText();?>
                            </p>
                            <span class="catalog__list__item__text__mini-title">Товары производителя</span>
                        </a>
                    </div>
                    <div class="catalog__list__item__footer">
                        <? if($item->propFilled('PREVIEW_PICTURES')): ?>
                            <div class="catalog__list__item__list">
                                <? foreach($item->get('PREVIEW_PICTURES') as $fileId => $src): ?>
                                    <a href="<?=$src;?>" title="<?=$item->getName();?>" data-fancybox class="catalog__list__item__list__item">
                                        <div class="catalog__list__item__list__item__wrap">
                                            <img src="<?=$src;?>" alt="<?=$item->getName();?>">
                                        </div>
                                    </a>
                                <? endforeach; ?>
                            </div>
                        <? endif; ?>
                        <div class="catalog__list__item__inf">
                            <span class="catalog__list__item__inf__price-text">Минимальная цена закупки</span>
                            <span class="catalog__list__item__inf__price">5000 руб.</span>
                            <a href="" class="core__btn">отправить запрос</a>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>

    <div class="core__line_bg"></div>
    <? if($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <?=$arResult["NAV_STRING"]?>
    <? endif; ?>
</div>
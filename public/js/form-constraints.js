$(function() {
    $(".numeric").numeric();
    $(".integer").numeric(false);
    $(".positive").numeric({
        negative: false
    });
    $(".integer").numeric({
        decimal: false
    });
    $(".digit-8").numeric({
        precision: 8
    });
    $(".digit-6").numeric({
        precision: 6
    });
    $(".decimal-2").numeric({
        scale: 2
    });
    $(".numeric-pi8").numeric({
        negative: false,
        decimal: false,
        precision: 8
    });
    $(".numeric-pi4").numeric({
        negative: false,
        decimal: false,
        precision: 4
    });
    $(".numeric-p8d2").numeric({
        negative: false,
        scale: 2,
        precision: 10
    });
    $(".numeric-p2d2").numeric({
        negative: false,
        scale: 2,
        precision: 4
    });
});
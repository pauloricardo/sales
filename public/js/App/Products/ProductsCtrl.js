/**
 * Created by paulo on 24/02/16.
 */
app.controller('ProductsCtrl', ['$scope', '$http', '$location', function (s, ajax, location) {

    s.products = [];
    s.currentPage = 1;
    s.maxSize = 10;
    s.numPages = 10;
    s.filterPaginate = "";

    load();
    /**
     *  Carrega os produtos
     */
    function load() {
        ajax.get('/admin/products/get-products/' + s.currentPage).success(function (result) {
            s.totalItems = result.number_rows;
            angular.copy(result.data, s.products);
        });
    }

    /**
     *  Salva os filtros
     */
    s.fillFilterPaginate = function () {
        s.filterPaginate = "?page=" + s.currentPage;
        for (a in s.filtro) {
            s.filterPaginate += "&" + a + "=" + s.filtro[a];
        }
    };

    /**
     *  Filtra os resultados
     */
    s.filterQuotations = function () {
        s.fillFilterPaginate();
        ajax.get(WEB_ROOT + 'quotations/filterQuotations' + s.filterPaginate).success(function (result) {
            s.totalItems = result.num_rows;
            angular.copy(result.dados, s.cotacoes);
        });
    };

    /**
     *  Paginação
     */
    s.pageChanged = function () {
        if (s.filterPaginate == "") {
            load();
        } else {
            s.filterQuotations();
        }
    };

    /**
     *  Limpa os filtros
     */
    s.cleanFilter = function () {
        s.filterPaginate = "";
        load();
    };

    s.predicate = 'name';
    s.reverse = true;

    /**
     * Ordenação dos resultados
     * @param predicate
     */
    s.order = function (predicate) {
        s.fillFilterPaginate();
        s.reverse = (s.predicate === predicate) ? !s.reverse : false;
        var direction = "ASC";
        if (s.reverse == false) {
            direction = "DESC";
        }

        s.predicate = predicate;
        s.filterPaginate += "&order=" + s.predicate + "&direction=" + direction;

        ajax.get(WEB_ROOT + 'quotations/filterQuotations' + s.filterPaginate).success(function (result) {
            s.totalItems = result.num_rows;
            angular.copy(result.dados, s.cotacoes);
            s.filterPaginate = "";
        });

    };
}]);
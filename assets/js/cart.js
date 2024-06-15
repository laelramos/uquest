function updateCartBadge() {
    $.ajax({
        url: '../../pages/shopping/actions/get_cart_count.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Assumindo que o script PHP retorna um número (total de itens no carrinho)
            $('#cart-count-nav').text(data.total);
            //console.log(data);
        },
        error: function (xhr, status, error) {
            console.error('Erro ao atualizar o badge do carrinho: ' + error);
        }
    });
}

function loadCartItems() {
    $.ajax({
        url: '../../pages/shopping/actions/get_cart_items.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#list-cart-nav').empty(); // Limpa a lista antes de adicionar novos itens

            data.forEach(function (item, index) {
                var listItemNav = `
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read" id="cart-item-nav-${item.ProdutoID}">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="flex-shrink-0 d-flex align-items-center">
                                <img src="../../assets/img/products/${item.Path}" alt="${item.Nome}" class="h-px-40 w-auto" />
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">${item.Nome}</h6>
                            <p class="mb-0">${item.Quantidade} unidade (s)</p>
                        </div>
                    </div>
                </li>`;

                $('#list-cart-nav').append(listItemNav);
            });
        },
        error: function (xhr, status, error) {
            console.error("Erro ao buscar itens do carrinho: ", error);
        }
    });
}


updateCartBadge();
loadCartItems();
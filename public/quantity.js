function quantityMinus(id, price) {
    
    quantity = document.getElementById(id).innerHTML;
    quantity = parseInt(quantity);
    --quantity;

    if (quantity > 0) {
        
        document.getElementById(id).innerHTML = quantity;
        document.getElementById(id + 'finalquant').value = quantity;

        subtot = parseFloat(document.getElementById('subtot' + id).innerHTML);
        price = parseFloat(document.getElementById(price).innerHTML);
        subtot = price * quantity;
        document.getElementById('subtot' + id).innerHTML = subtot;

        totprice = parseFloat(document.getElementById('totprice').innerHTML);
        totprice -= price;
        document.getElementById('totprice').innerHTML = totprice;

        totquant = parseInt(document.getElementById('totquant').innerHTML);
        --totquant;
        document.getElementById('totquant').innerHTML = totquant;

    }

}


function quantityPlus(id, stock, price) {

    quantity = document.getElementById(id).innerHTML;
    quantity = parseInt(quantity);
    ++quantity;

    if (quantity <= stock) {
        
        document.getElementById(id).innerHTML = quantity;
        document.getElementById(id + 'finalquant').value = quantity;

        subtot = parseFloat(document.getElementById('subtot' + id).innerHTML);
        price = parseFloat(document.getElementById(price).innerHTML);
        subtot = price * quantity;
        document.getElementById('subtot' + id).innerHTML = subtot;

        totprice = parseFloat(document.getElementById('totprice').innerHTML);
        totprice += price;
        document.getElementById('totprice').innerHTML = totprice;

        totquant = parseInt(document.getElementById('totquant').innerHTML);
        ++totquant;
        document.getElementById('totquant').innerHTML = totquant;

    }
}
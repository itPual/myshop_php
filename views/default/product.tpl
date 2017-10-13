{*product page*}

<h3>{$rsProduct['name']}</h3>

<img width="575" src="/images/products/{$rsProduct['image']}" />
Price: {$rsProduct['price']}

<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart} class="hideme" {/if} href="#" onclick="removeFromCart({$rsProduct['id']}); return false;" alt="Remove from Basket">Remove from Basket</a>
<a id="addCart_{$rsProduct['id']}" {if $itemInCart} class="hideme" {/if} href="#" onclick="addToCart({$rsProduct['id']}); return false;" alt="Add to Basket">Add to Basket</a>
<p>Description <br/>{$rsProduct['description']}</p>
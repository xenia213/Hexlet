<?

/**
 * Напишите тесты для корзины интернет-магазина. Интерфейс:
 * 
 * addItem($good, $count) – добавляет в корзину товары и их количество. 
 * Товар – это ассоциативный массив с двумя ключами: name (имя) и price 
 * (стоимость).
 * 
 * getItems() – возвращает список товаров в формате [[ good, count ], 
 * [good, count ], ...].
 * 
 * getCost() – возвращает стоимость корзины. Стоимость корзины высчитывается 
 * как сумма всех добавленных товаров с учётом их количества.
 * 
 * getCount() – возвращает количество товаров в корзине.
 */
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Implementations\Cart;

class SolutionTest extends TestCase
{
    public function testCart(): void
    {
        // BEGIN (write your solution here)
        $cart = new Cart();

        $cart->addItem(['name' => 'car', 'price' => 100], 3);
        $cart->addItem(['name' => 'tv', 'price' => 10], 5);

        $this->assertEquals(2, count($cart->getItems()));
        $this->assertEquals(8, $cart->getCount());
        $this->assertEquals(350, $cart->getCost());
        // END
    }
}


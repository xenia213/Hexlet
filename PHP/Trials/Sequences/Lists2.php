<?

/**
 * Реализуйте следующие функции:
 * l(...$items) — функция-конструктор. Уже реализована
 * toString($list) — возвращает строковое представление списка
 * head($list) — возвращает первый элемент списка
 * tail($list) — возвращает "хвост" списка (все элементы, кроме первого)
 * isEmpty($list) — проверяет, является ли список пустым
 * cons($item, $list) — добавляет элемент в начало списка и возвращает новый список
 * filter($list, $predicate) — фильтрует список, используя предикат
 * map($list, $callback) — преобразует список, используя callback-функцию
 * reduce($list, $callback, $init) — производит свертывание списка
 */

namespace Lists;

const DELIMETER = "\n";

function l(...$items)
{
     return implode(DELIMETER, $items);
}

function cons($item, $list)
{
    return function ($method) use ($item, $list) {
        switch ($method) {
            case "head":
                return $item;
            case "tail":
                return $list;
        }
    };
}

function head(callable $list)
{
    return $list("head");
}

function tail(callable $list)
{
    return $list("tail");
}

function toString($list)
{
    if (isEmpty($list)) {
        return '()';
    }

    $iter = function ($list) use (&$iter) {
        $first = head($list);
        $rest = tail($list);
        if (isEmpty($rest)) {
            return toString($first);
        }

        return toString($first) . ', ' . $iter($rest);
    };

    return '(' . $iter($list) . ')';
}

function isEmpty($list)
{
    return $list === null;
}

function filter($list, $predicate)
{
    if (isEmpty($list)) {
        return l();
    }

    $first = head($list);
    $rest = tail($list);
    if ($predicate($first)) {
        return cons($first, filter($rest, $predicate));
    }
    return filter($rest, $predicate);
}

function map($list, $callback)
{
    if (isEmpty($list)) {
        return l();
    }

    $newElem = $callback(head($list));

    return cons($newElem, map(tail($list), $callback));
}

function reduce($list, $callback, $init)
{
    $iter = function ($items, $acc) use (&$iter, $callback) {
        return isEmpty($items) ? $acc : $iter(tail($items), $callback(head($items), $acc));
    };

    return $iter($list, $init);
}

//$list = l();
//$this->assertEquals('()', 
//print_r(toString($list));
 /*$list = l('foo', 'bar', 'baz');
 
print_r(toString($list)); // (foo, bar, baz)
  
print_r(head($list)); // 'foo'
print_r(tail($list)); // l('bar', 'baz')
  
print_r(isEmpty($list)); // false
print_r(isEmpty(l())); // true
  
 $newList = cons('bas', $list); // l('bas', 'foo', 'bar', 'baz')
 $filteredList = filter($list, fn($item) => $item[0] === 'b'); // l('bar', 'baz')
 $mappedList = map($list, fn($item) => $item[0]); // l('f', 'b', 'b')
 $reducedList = reduce($list, fn($item, $acc) => $acc ? "{$acc},{$item}" : $item, '');  // foo,bar,baz
 
*/

/**
 * public function testIsEmptyList()
    {
        
    }

    public function testOneItem()
    {
        $list = l('foo');
        $this->assertEquals('foo', head($list));
        $this->assertEquals('()', toString(tail($list)));
    }

    public function testMultipleItems()
    {
        $list = l('foo', 'bar', 'baz');
        $this->assertEquals('foo', head($list));
        $this->assertEquals(toString(l('bar', 'baz')), toString(tail($list)));
    }

    public function testIsEmpty()
    {
        $this->assertTrue(isEmpty(l()));
        $this->assertFalse(isEmpty(l('hello')));
    }

    public function testCons()
    {
        $list = l('foo', 'bar', 'baz');
        $this->assertEquals(toString(l('bas', 'foo', 'bar', 'baz')), toString(cons('bas', $list)));
    }

    public function testFilter()
    {
        $list = l('foo', 'bar', 'baz');
        $this->assertEquals(toString(l('foo', 'baz')), toString(filter($list, fn($item) => $item !== 'bar')));
        $this->assertEquals(toString(l('foo', 'bar')), toString(filter($list, fn($item) => $item !== 'baz')));
    }

    public function testAppendToEmpty()
    {
        $list = l();
        $this->assertEquals(toString(l('bas')), toString(cons('bas', $list)));
    }

    public function testMap()
    {
        $list = l('foo', 'bar', 'baz');
        $this->assertEquals(toString(l('f', 'b', 'b')), toString(map($list, fn($item) => $item[0])));
        $this->assertEquals(toString(l('o', 'a', 'a')), toString(map($list, fn($item) => $item[1])));
    }

    public function testReduce()
    {
        $list = l('foo', 'bar', 'baz');
        $this->assertEquals('foo+bar+baz', reduce($list, fn($item, $acc) => $acc ? "{$acc}+{$item}" : $item, ''));
        $list2 = l(3, 4, 1);
        $this->assertEquals(12, reduce($list2, fn($item, $acc) => $acc ? $acc * $item : $item, 1));
    }

    public function testToString()
    {
        $list = l('foo', 0, 'baz');
        $this->assertEquals('(foo, 0, baz)', toString($list));
    }
 */
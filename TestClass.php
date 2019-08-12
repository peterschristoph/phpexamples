<?php

/**
 * Class TestClass show 2 methods doing the same.
 * The easy function is using a little bit of clean code basic approach.
 * The complex function is "just from head".
 *
 * This is only a example for code style and easier code and has no reasonable background.
 * The method for comparing is not good, it's just for showing code style.
 * The methods have exactly the same result.
 */
class TestClass
{
    const TYPE_ONE = 'Diff more time than maxSeconds';
    const TYPE_TWO = 'Diff less time than maxSeconds';

    private $myFlag = true;

    private $defaultDateTime;

    public function __construct()
    {
        $this->defaultDateTime = new DateTime();
        $this->defaultDateTime->setDate('2019', '1', '1');

        $this->compareDateTime = new DateTime();
        //       $this->compareDateTime->modify('+20 day');
        $this->compareDateTime->modify('-40000 day');
    }

    /**
     * This is a example for doing some things more complex than needful
     * 1. 3 Times a return - maybe sometimes helpfully but not in this case.
     * 2. 2 Times the exactly same return (double code)
     *
     * @return array
     * @throws Exception
     */
    public function complex()
    {
        if ($this->myFlag) {
            $actualDateTime = new DateTime();
            $differenceInSeconds = $actualDateTime->getTimestamp() - $this->defaultDateTime->getTimestamp();

            if ($this->compareDateTime && $this->compareDateTime->getTimestamp() < $differenceInSeconds) {
                return array(
                    'typeMessage' => self::TYPE_ONE,
                    'data'        => $this->compareDateTime->getTimestamp(),
                );
            }

            return array(
                'typeMessage' => self::TYPE_TWO,
                'data'        => $differenceInSeconds,
            );
        }
        return array(
            'typeMessage' => self::TYPE_ONE,
            'data'        => $this->compareDateTime->getTimestamp(),
        );
    }

    /**
     * 1. Define some default result array
     * (2. Use short notation)
     * 3. Use only 1 return point
     * 4. Change operator at if from "<" to ">"
     * 5. Check $this->compareDateTime statement before
     *    The resultArray is only overridden if $this->myFlag
     * 6. Attention: you must ensure that $this->compareDateTime is always a DateTime Object!
     *               Make it not writable via public and set it via construct for example.
     *
     * @return array
     * @throws Exception
     */
    public function easy()
    {
        $resultArray = [
            'typeMessage' => self::TYPE_ONE,
            'data'        => $this->compareDateTime->getTimestamp(),
        ];

        if ($this->myFlag) {
            $actualDateTime = new DateTime();
            $differenceInSeconds = $actualDateTime->getTimestamp() - $this->defaultDateTime->getTimestamp();

            if ($this->compareDateTime->getTimestamp() > $differenceInSeconds) {
                $resultArray = [
                    'typeMessage' => self::TYPE_TWO,
                    'data'        => $differenceInSeconds,
                ];
            }
        }

        return $resultArray;
    }
}

$testClass = new TestClass();
var_dump($testClass->complex());
var_dump($testClass->easy());

<?php

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
trait UserControllerMockTrait
{
    private function mockController()
    {
        $repoMock = $this->mockRepository();
        $factoryMock = $this->mockResponseFactory();

        return new \Demo\User\Controller\UserListController($repoMock, $factoryMock);
    }

    private function mockRepository()
    {
        $m = $this->getMockBuilder(\Demo\User\Repository\UserRepository::class)
            ->disableOriginalConstructor()
            ->setMethods(['findAll'])
            ->getMock();
        $m->method('findAll')->willReturn($this->mockData());

        return $m;
    }

    /**
     * @return array
     */
    private function mockData()
    {
        return [
            [
                'first_name' => 'a',
                'last_name' => 'b',
                'login' => 'c'
            ],
            [
                'first_name' => 'd',
                'last_name' => 'e',
                'login' => 'f'
            ]
        ];
    }

    private function mockResponseFactory()
    {
        $m = $this->getMockBuilder(\Demo\Response\JsonResponseFactory::class)
            ->setMethods(['create'])
            ->getMock();
        $m->method('create')->willReturn(new \Symfony\Component\HttpFoundation\JsonResponse($this->mockData()));
        return $m;
    }

    private function mockRequest()
    {
        $m = $this->getMockBuilder(\Symfony\Component\HttpFoundation\Request::class)
            ->setMethods(['get'])
            ->getMock();
        $m->method('get')->willReturnCallback([$this, 'get']);

        return $m;
    }

    public function get($arg)
    {
        return $arg;
    }
}
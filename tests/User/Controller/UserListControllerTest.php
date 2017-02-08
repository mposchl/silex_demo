<?php
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserListControllerTest extends PHPUnit_Framework_TestCase
{
    use UserControllerMockTrait;

    public function testInvoke()
    {
        $object = $this->mockController();

        $requestMock = $this->mockRequest();

        $this->assertEquals(new JsonResponse($this->mockData(), Response::HTTP_OK), $object->invoke($requestMock));
    }

}
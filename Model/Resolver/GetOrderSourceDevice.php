<?php
namespace Ahmed\order\Model\Resolver;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Order;

class GetOrderSourceDevice implements ResolverInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository
    ) {
        $this->orderRepository = $orderRepository;
    }

    public function resolve(
        \Magento\Framework\GraphQl\Config\Element\Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null) {

        if (empty($args['order_id'])) {
            throw new GraphQlNoSuchEntityException(__('Please specify a valid order ID.'));
        }

        try {
            /** @var Order $order */
            $order = $this->orderRepository->get($args['order_id']);
        } catch (LocalizedException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()));
        }
        return $order->getOrderSourceDevice();
    }
}

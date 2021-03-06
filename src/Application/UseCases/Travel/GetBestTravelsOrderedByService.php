<?php
/**
 * Created by PhpStorm.
 * User: albert.juhe
 * Date: 01/10/2018
 * Time: 07:13.
 */

namespace App\Application\UseCases\Travel;

use App\Application\UseCases\usesCasesService;
use App\Domain\Travel\Repository\TravelRepository;
use App\Application\Command\Travel\BestTravelsListCommand;

class GetBestTravelsOrderedByService implements usesCasesService
{
    /**
     * @var TravelRepository;
     */
    private $travelRepository;

    /**
     * GetAllMyTravels constructor.
     *
     * @param TravelRepository $travelRepository
     */
    public function __construct(TravelRepository $travelRepository)
    {
        $this->travelRepository = $travelRepository;
    }

    /**
     * @param BestTravelsListCommand $command
     *
     * @return mixed
     */
    public function handle(BestTravelsListCommand $command)
    {
        $numberMaxOfTravels = $command->getNumberMaxOfTravels();
        $orderedBy = $command->getOrderedBy();

        return $this->travelRepository->TravelsAllOrderedBy($numberMaxOfTravels);
    }
}

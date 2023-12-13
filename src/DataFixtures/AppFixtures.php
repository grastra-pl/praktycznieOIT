<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\RailwayConnection;
use Psr\Log\LoggerInterface;

class AppFixtures extends Fixture
{
    private $logger;

    private $train_names = [
        'Pojazd Expressowy',
        'Szybki Tor',
        'Pociąg Błyskawica',
        'Mocny Wagon',
        'Prędkość Polska',
        'Lokomotywa Polska',
        'Kolejna Przygoda',
        'Ślimak Express',
        'Torowisko Polskie',
        'Ekspres Krajowy',
        'Wagon Bez Granic',
        'Nowoczesny Szynobus',
        'Przełamujący Wiatr',
        'Rozpędzony Kolejarz',
        'Trasa Polska',
        'Górskie Pętle',
        'Wagonik Zdrowia',
        'Kaskadowy Express',
        'Szyna Sztormu',
    ];

    private $options = [
        'Poznań',
        'Warszawa',
        'Łódź',
        'Kraków',
        'Wrocław',
        'Rzeszów',
        'Gdańsk',
        'Szczecin',
    ];

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function load(ObjectManager $manager): void
    {
        $this->logger->info("test");
        for ($i = 180; $i !== 365; $i++) {
            for ($y = 0; $y !== 100; $y++) {
                $rail = new RailwayConnection();
                $week = round($i / 7) + 1;
                $dayOfTheWeek = $i % 7 + 1;
                $day = "2023-W$week-$dayOfTheWeek";

                $hourFirst = rand(3, 18);
                $minuteFirst = rand(0, 59);
                $hourSecond = $hourFirst + rand(0, 5);
                $minuteSecond = rand(0, 59);


                if (strlen($minuteFirst) == 1) $minuteFirst = "0$minuteFirst";
                if (strlen($minuteSecond) == 1) $minuteSecond = "0$minuteSecond";

                $dateTimeA = \DateTimeImmutable::createFromFormat('Y z G:i', "2023 $i $hourFirst:$minuteFirst");
                $dateTimeB = \DateTimeImmutable::createFromFormat('Y z G:i', "2023 $i $hourSecond:$minuteSecond");
                echo "2023 $i $hourFirst:$minuteFirst" . PHP_EOL;
                $rail->setArrivesAt($dateTimeB);
                $rail->setLeavesAt($dateTimeA);
                $rail->setTrainName($this->train_names[rand(0, 15)]);
                
                $initialIndex = rand(0,7);
                $initialStation = $this->options[$initialIndex];
                $options = $this->options;
                unset($options[$initialIndex]);
                sort($options);
                $destinationStation = $options[rand(0,6)];
                $rail->setInitialStation($initialStation);
                $rail->setDestinationStation($destinationStation);
                
                $rail->setDistanceTraveled(($hourSecond-$hourFirst)*120 + abs($minuteSecond - $minuteFirst)*2);
                $rail->setTicketPrice(abs((($hourSecond-$hourFirst)*120)/10 + ($minuteSecond - $minuteFirst)*2)+0.99);
                $manager->persist($rail);

            }
        }
        //   $rail->setArrivesAt()

        $manager->flush();
    }
}

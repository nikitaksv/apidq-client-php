<?php

namespace ApiDQ\Tests\Resource;

use ApiDQ\Exception\Service\ServiceException;
use ApiDQ\Model\Service\Address\CleanRequest;
use ApiDQ\Model\Service\Address\SuggestRequest;
use ApiDQ\TestUtils\Factory\TestClientFactory;
use ApiDQ\TestUtils\TestCase\AbstractResourceTestCase;
use Pock\Enum\RequestMethod;
use Psr\Http\Client\ClientExceptionInterface;

class AddressTest extends AbstractResourceTestCase
{

    /**
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function testClean(): void
    {
        $json = <<<'EOF'
{
  "original": "москва спартаковская 10с12",
  "address": "г Москва, пл Спартаковская",
  "postcodeIn": "",
  "postcode": "105082",
  "region": {
    "fullName": "г Москва",
    "name": "Москва",
    "type": "г",
    "codes": {
      "fias": "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
      "ga": "RU0770000000000000000000000",
      "osm": ""
    }
  },
  "area": {
    "fullName": "",
    "name": "",
    "type": "",
    "codes": {
      "fias": "",
      "ga": "",
      "osm": ""
    }
  },
  "city": {
    "fullName": "",
    "name": "",
    "type": "",
    "codes": {
      "fias": "",
      "ga": "",
      "osm": ""
    }
  },
  "cityArea": {
    "fullName": "",
    "name": "",
    "type": "",
    "codes": {
      "fias": "",
      "ga": "",
      "osm": ""
    }
  },
  "settlement": {
    "fullName": "",
    "name": "",
    "type": "",
    "codes": {
      "fias": "",
      "ga": "",
      "osm": ""
    }
  },
  "planStructure": {
    "fullName": "",
    "name": "",
    "type": "",
    "codes": {
      "fias": "",
      "ga": "",
      "osm": ""
    }
  },
  "street": {
    "fullName": "пл Спартаковская",
    "name": "Спартаковская",
    "type": "пл",
    "codes": {
      "fias": "cd6717bf-1b64-4004-a042-ff1164313e7c",
      "ga": "RU0770000000000000000002733",
      "osm": ""
    }
  },
  "houseDetails": {
    "fullName": "дом 10, строение 12",
    "floor": "",
    "house": "10",
    "case": "",
    "build": "12",
    "liter": "",
    "lend": "",
    "block": "",
    "pav": "",
    "flat": "",
    "office": "",
    "kab": "",
    "abon": "",
    "plot": "",
    "sek": "",
    "entr": "",
    "room": "",
    "hostel": "",
    "munit": ""
  },
  "coordinates": {
    "latitude": 55.777322,
    "longitude": 37.677688
  },
  "country": {
    "name": "Россия",
    "alpha2": "RU",
    "alpha3": "RUS",
    "numeric": 643
  },
  "valid": true,
  "quality": {
    "unique": 0,
    "actuality": 0,
    "undefined": 0,
    "level": 8,
    "house": 3,
    "geo": 8
  }
}
EOF;
        $request = (new CleanRequest())
            ->setQuery('москва спартаковская 10с12')
            ->setCountryCode('RU');

        $mock = static::createApiMockBuilder('/v1/clean/address');
        $mock->matchMethod(RequestMethod::POST)->reply()->withBody($json);

        $client = TestClientFactory::createClient($mock->getClient());
        $response = $client->address->clean($request);
        self::assertEquals($request->getQuery(), $response->getOriginal());
        $rspJson = static::$serializer->serialize($response, 'json');
        self::assertJsonStringEqualsJsonString($json, $rspJson);
    }

    /**
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function testCleanIqdq(): void
    {
        $json = <<<'EOF'
{
  "c_ischeck": "1",
  "c_index_in": "",
  "c_zipcode": "105082",
  "c_address_original": "москва спартаковская 10с12",
  "c_address_full": "г Москва, пл Спартаковская",
  "c_kladr": "",
  "c_gaCode": "",
  "c_country": "Россия",
  "c_country_iso_code": "RU",
  "c_region_name": "Москва",
  "c_region_abbr": "г",
  "c_region_fias": "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
  "c_district_name": "",
  "c_district_abbr": "",
  "c_district_fias": "",
  "c_city_name": "",
  "c_city_abbr": "",
  "c_city_fias": "",
  "c_community_name": "",
  "c_community_abbr": "",
  "c_community_fias": "",
  "c_street_name": "Спартаковская",
  "c_street_abbr": "пл",
  "c_street_fias": "cd6717bf-1b64-4004-a042-ff1164313e7c",
  "c_json_kvant": {
    "fullName": "дом 10, строение 12",
    "floor": "",
    "house": "10",
    "case": "",
    "build": "12",
    "liter": "",
    "lend": "",
    "block": "",
    "pav": "",
    "flat": "",
    "office": "",
    "kab": "",
    "abon": "",
    "plot": "",
    "sek": "",
    "entr": "",
    "room": "",
    "hostel": "",
    "munit": ""
  },
  "c_house_str": "дом 10, строение 12",
  "c_addr_lost": "",
  "c_status_error": "000038",
  "c_house_error": "3",
  "c_house_error_desc": "",
  "c_kladr19": "",
  "c_gninmb": "",
  "c_okato": "",
  "c_oktmo": "",
  "c_aoguid": "",
  "c_aolevel": "8",
  "c_houseguid": "",
  "c_timezone": "",
  "c_coordinate": {
    "c_lon": 37.677688,
    "c_lat": 55.777322,
    "c_level": 8
  }
}
EOF;

        $request = (new CleanRequest())
            ->setQuery('москва спартаковская 10с12')
            ->setCountryCode('RU');

        $mock = static::createApiMockBuilder('/v1/clean/address/iqdq');
        $mock->matchMethod(RequestMethod::POST)->reply()->withBody($json);

        $client = TestClientFactory::createClient($mock->getClient());
        $response = $client->address->cleanIqdq($request);
        self::assertEquals($request->getQuery(), $response->getCAddressOriginal());
        $rspJson = static::$serializer->serialize($response, 'json');
        self::assertJsonStringEqualsJsonString($json, $rspJson);
    }

    /**
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function testSuggest(): void
    {
        $json = <<<'EOF'
{
  "suggestions": [
    {
      "address": "г Москва, Варшавское ш",
      "postcode": "117105",
      "region": {
        "fullName": "г Москва",
        "name": "Москва",
        "type": "г",
        "codes": {
          "fias": "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
          "ga": "RU0770000000000000000000000",
          "osm": ""
        }
      },
      "area": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "city": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "cityArea": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "settlement": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "planStructure": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "street": {
        "fullName": "Варшавское ш",
        "name": "Варшавское",
        "type": "ш",
        "codes": {
          "fias": "8fc06b0b-5de3-4a72-9e6f-9e0647a37a66",
          "ga": "RU0770000000000000000000476",
          "osm": ""
        }
      },
      "houseDetails": {
        "fullName": "",
        "floor": "",
        "house": "",
        "case": "",
        "build": "",
        "liter": "",
        "lend": "",
        "block": "",
        "pav": "",
        "flat": "",
        "office": "",
        "kab": "",
        "abon": "",
        "plot": "",
        "sek": "",
        "entr": "",
        "room": "",
        "hostel": "",
        "munit": ""
      },
      "coordinates": {
        "latitude": 55.646,
        "longitude": 37.6203
      },
      "country": {
        "name": "Россия",
        "alpha2": "RU",
        "alpha3": "RUS",
        "numeric": 643
      }
    },
    {
      "address": "г Москва, 2-й Варшавский проезд",
      "postcode": "115201",
      "region": {
        "fullName": "г Москва",
        "name": "Москва",
        "type": "г",
        "codes": {
          "fias": "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
          "ga": "RU0770000000000000000000000",
          "osm": ""
        }
      },
      "area": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "city": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "cityArea": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "settlement": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "planStructure": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "street": {
        "fullName": "2-й Варшавский проезд",
        "name": "2-й Варшавский",
        "type": "проезд",
        "codes": {
          "fias": "b89718e1-8b56-4ba8-8383-5c7b596aee6c",
          "ga": "RU0770000000000000000000475",
          "osm": ""
        }
      },
      "houseDetails": {
        "fullName": "",
        "floor": "",
        "house": "",
        "case": "",
        "build": "",
        "liter": "",
        "lend": "",
        "block": "",
        "pav": "",
        "flat": "",
        "office": "",
        "kab": "",
        "abon": "",
        "plot": "",
        "sek": "",
        "entr": "",
        "room": "",
        "hostel": "",
        "munit": ""
      },
      "coordinates": {
        "latitude": 55.6442,
        "longitude": 37.63
      },
      "country": {
        "name": "Россия",
        "alpha2": "RU",
        "alpha3": "RUS",
        "numeric": 643
      }
    },
    {
      "address": "г Москва, 1-й Варшавский проезд",
      "postcode": "115201",
      "region": {
        "fullName": "г Москва",
        "name": "Москва",
        "type": "г",
        "codes": {
          "fias": "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
          "ga": "RU0770000000000000000000000",
          "osm": ""
        }
      },
      "area": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "city": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "cityArea": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "settlement": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "planStructure": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "street": {
        "fullName": "1-й Варшавский проезд",
        "name": "1-й Варшавский",
        "type": "проезд",
        "codes": {
          "fias": "09ffd474-1ca8-42e1-8217-876300fd7c2c",
          "ga": "RU0770000000000000000000474",
          "osm": ""
        }
      },
      "houseDetails": {
        "fullName": "",
        "floor": "",
        "house": "",
        "case": "",
        "build": "",
        "liter": "",
        "lend": "",
        "block": "",
        "pav": "",
        "flat": "",
        "office": "",
        "kab": "",
        "abon": "",
        "plot": "",
        "sek": "",
        "entr": "",
        "room": "",
        "hostel": "",
        "munit": ""
      },
      "coordinates": {
        "latitude": 55.6501,
        "longitude": 37.6264
      },
      "country": {
        "name": "Россия",
        "alpha2": "RU",
        "alpha3": "RUS",
        "numeric": 643
      }
    },
    {
      "address": "г Москва, п Вороновское, Варшавское 64-й км ш",
      "postcode": "108830",
      "region": {
        "fullName": "г Москва",
        "name": "Москва",
        "type": "г",
        "codes": {
          "fias": "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
          "ga": "RU0770000000000000000000000",
          "osm": ""
        }
      },
      "area": {
        "fullName": "п Вороновское",
        "name": "Вороновское",
        "type": "п",
        "codes": {
          "fias": "10409e98-eb2d-4a52-acdd-7166ca7e0e48",
          "ga": "RU0770020000000000000000000",
          "osm": ""
        }
      },
      "city": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "cityArea": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "settlement": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "planStructure": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "street": {
        "fullName": "Варшавское 64-й км ш",
        "name": "Варшавское 64-й км",
        "type": "ш",
        "codes": {
          "fias": "dc6cb90e-fe77-44c7-93f7-ec39909489e1",
          "ga": "RU0770020000000000000000015",
          "osm": ""
        }
      },
      "houseDetails": {
        "fullName": "",
        "floor": "",
        "house": "",
        "case": "",
        "build": "",
        "liter": "",
        "lend": "",
        "block": "",
        "pav": "",
        "flat": "",
        "office": "",
        "kab": "",
        "abon": "",
        "plot": "",
        "sek": "",
        "entr": "",
        "room": "",
        "hostel": "",
        "munit": ""
      },
      "coordinates": {
        "latitude": 55.2921,
        "longitude": 37.1821
      },
      "country": {
        "name": "Россия",
        "alpha2": "RU",
        "alpha3": "RUS",
        "numeric": 643
      }
    },
    {
      "address": "г Москва, Варшавское шоссе 28-й км (п Воскресенско км",
      "postcode": "117148",
      "region": {
        "fullName": "г Москва",
        "name": "Москва",
        "type": "г",
        "codes": {
          "fias": "0c5b2444-70a0-4932-980c-b4dc0d3f02b5",
          "ga": "RU0770000000000000000000000",
          "osm": ""
        }
      },
      "area": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "city": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "cityArea": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "settlement": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "planStructure": {
        "fullName": "",
        "name": "",
        "type": "",
        "codes": {
          "fias": "",
          "ga": "",
          "osm": ""
        }
      },
      "street": {
        "fullName": "Варшавское шоссе 28-й км (п Воскресенско км",
        "name": "Варшавское шоссе 28-й км (п Воскресенско",
        "type": "км",
        "codes": {
          "fias": "b4a45703-7ca1-4dff-9f9d-8e34deadbf33",
          "ga": "RU0770000000000000000007569",
          "osm": ""
        }
      },
      "houseDetails": {
        "fullName": "",
        "floor": "",
        "house": "",
        "case": "",
        "build": "",
        "liter": "",
        "lend": "",
        "block": "",
        "pav": "",
        "flat": "",
        "office": "",
        "kab": "",
        "abon": "",
        "plot": "",
        "sek": "",
        "entr": "",
        "room": "",
        "hostel": "",
        "munit": ""
      },
      "coordinates": {
        "latitude": 55.4926,
        "longitude": 37.5928
      },
      "country": {
        "name": "Россия",
        "alpha2": "RU",
        "alpha3": "RUS",
        "numeric": 643
      }
    }
  ]
}
EOF;

        $request = (new SuggestRequest())
            ->setQuery('москва варш')
            ->setCountryCode('RU')
            ->setCount(5);

        $mock = static::createApiMockBuilder('/v1/suggest/address');
        $mock->matchMethod(RequestMethod::POST)->reply()->withBody($json);

        $client = TestClientFactory::createClient($mock->getClient());
        $response = $client->address->suggest($request);
        self::assertCount($request->getCount(), $response->getSuggestions());
        $rspJson = static::$serializer->serialize($response, 'json');
        self::assertJsonStringEqualsJsonString($json, $rspJson);
    }
}

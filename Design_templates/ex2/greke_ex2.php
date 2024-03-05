<?php

abstract class Main {
    protected $name;
    protected $enviroment;
    protected $tools;
    protected $keywords;
    protected $unique;

    public function __construct($name, $enviroment, $tools, $keywords, $unique) {
        $this->name = $name;
        $this->enviroment = $enviroment;
        $this->tools = $tools;
        $this->keywords = $keywords;
        $this->unique = $unique;
    }

    abstract public function unique();
}

interface SetSkills {
    public function skills();
}

class Profession extends Main {
    public function unique() {
        return $this->unique;
    }
}

class Actor extends Profession implements SetSkills {
    public function __construct($name, $enviroment, $tools, $keywords, $unique, $reward) {
        parent::__construct($name, $enviroment, $tools, $keywords, $unique);
        $this->reward = $reward;
    }

    public function skills() {
        return "{$this->name}: {$this->enviroment}, {$this->reward} nomination";
    }
}

class Doctor extends Profession implements SetSkills {
    public function __construct($name, $enviroment, $tools, $keywords, $unique, $degree) {
        parent::__construct($name, $enviroment, $tools, $keywords, $unique);
        $this->degree = $degree;
    }

    public function skills() {
        return "{$this->name}: Patient {$this->enviroment}, {$this->degree} degree";
    }
}

$actor = new Actor("Rayan Gosling", "Acting", "Face", "smile, expressions", "Age", "Oscar");
$doctor = new Doctor("Gregory House", "Treatment", "Brain", "scalrel, robe", "Certification", "M.D");

echo $actor->skills() . '<br>';
echo $doctor->skills();

?>

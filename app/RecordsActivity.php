<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait RecordsActivity{

        protected static function bootRecordsActivity()
        {
            if(auth()->guest()) return;
            foreach(static::getActivitiesToRecord() as $event)
            {
            static::$event(function ($model) use ($event){
                $model->recordActivity($event);
             });
            }
        }

        protected static function getActivitiesToRecord()
        {
            return ['created'];
        }

    protected function recordActivity($event)
        {
            $this->Activity()->create([
                'user_id' => auth()->id(),
                'type' => $this->getActivityType($event),
                'subject_type' => get_class($this)
            ]);
            // Activity::create([
              
            //     'subject_id' => $this->id,
            //     'subject_type' => get_class($this)
            // ]);
        }
        public function activity()
        {
            return $this->MorphMany(Activity::class,'subject');
        }
        protected function getActivityType($event)
        {
            return $event . '_' . strtolower((new \ReflectionClass($this))->getShortName());
        }

}
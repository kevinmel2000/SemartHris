<?php

namespace KejawenLab\Application\SemartHris\Form\Manipulator;

use KejawenLab\Application\SemartHris\Entity\Attendance;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Muhamad Surya Iksanudin <surya.iksanudin@kejawenlab.com>
 */
final class AttendanceManipulator extends FormManipulator implements FormManipulatorInterface
{
    public function manipulate(FormBuilderInterface $formBuilder, $entity): FormBuilderInterface
    {/* @var Attendance $entity */
        $formBuilder = parent::manipulate($formBuilder, $entity);

        if (!$reason = $entity->getReason()) {
            $formBuilder->remove('reason_readonly');
        } else {
            $formBuilder->remove('reason_text');

            $formBuilder->get('reason_readonly')->setData($reason);
        }

        return $formBuilder;
    }
}
